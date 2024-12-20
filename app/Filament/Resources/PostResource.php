<?php

namespace App\Filament\Resources;

use OpenAI;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Faker\Provider\ar_EG\Text;
use App\Jobs\GenerateAIContent;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\Widgets\PostOverview;
use App\Models\Category;
use App\Utiliteis\CategoryUtil;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $pollingInterval = '10s';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected $listeners = ['jobProcessed' => 'refreshTable'];

    #[On('jobProcessed')]

    #[On('jobProcessed')]
    public function refreshTable()
    {
        logger('refresh');
    }
    public static function form(Form $form): Form
    {
    return $form->schema([
        Grid::make(2)->columns([
           'default'=>2,
           'md'=>1,
        ])->schema([
            // Actions::make([
            //     Action::make('Generate Using Ai')
            //         ->form([
            //             TextInput::make('topic')->label('Topic Name')
            //                 ->required()
            //                 ->autocomplete(fn (Get $get) => $get('title') ?? '')
            //                 // ->autocomplete(fn (Get $get) => $get('title') ?? '')
            //         ])
            //         ->action(function (array $data, Post $post, Set $set) {
            //                 $topic = $data['topic'];
            //                 $yourApiKey = getenv('openai_key');
            //                 $client = OpenAI::client($yourApiKey);
            //                 $prompt = "Generate a blog post about (You can separate Paragraph and add header if exist): ";
            //                 $result = $client->chat()->create([
            //                     'model' => 'gpt-4',
            //                     'messages' => [
            //                         ['role' => 'user', 'content' => $prompt . $topic],
            //                     ],
            //                 ]);
            //             $content = $result->choices[0]->message->content;
            //              $set('title', $topic);
            //              $set('slug', Str::slug($topic));
            //              $set('content', $content);
            //         })
            // ])->columnSpan(2),
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->live(true, debounce: 600)
                ->afterStateUpdated(function (Set $set, ?string $state) {
                    $slug = Str::slug($state);
                    $uniqueSlug = $slug;
                    $counter = 1;
                    while (Post::where('slug', $uniqueSlug)->exists()) {
                        $uniqueSlug = $slug . '-' . $counter++;
                    }
                    $set('slug', $uniqueSlug);
                }),
            TextInput::make('slug')
                ->required()
                ->readOnly(),
            Select::make('status')
                ->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ])
                ->default('draft')
                ->selectablePlaceholder(false),

            Select::make('categories')
                ->label('Category')
                ->relationship('categories', 'name')
                ->searchable()
                ->multiple()
                ->getSearchResultsUsing(fn (string $search): array => Category::where('name', 'like', "%{$search}%")
                ->limit(50)->pluck('name', 'id')
                ->toArray())
                 ->getOptionLabelUsing(fn ($value): ?string => Category::find($value)?->name)
                 ->createOptionForm(CategoryUtil::form()),

            FileUpload::make('featured_image')->image()->columnSpan(2),
            RichEditor::make('content')
                ->live(debounce: 600)
                ->columnSpan(2)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('excerpt',  Str::limit(strip_tags($state), 200))),
            Hidden::make('excerpt', fn (Post $post) => Str::limit(strip_tags($post->content), 100)),
            Hidden::make('user_id')
                ->default(auth()->id()),
            Hidden::make('published_at')->default(now()),


        ])
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('1s')
            ->headerActions([
                Action::make('Generate Using Ai')
                    ->form([
                        Repeater::make('topics')
                        ->schema([
                            TextInput::make('title')->label('Topic Name')
                            ->required()
                        ])->required(true)

                    ])
                    ->action(function (array $data, Post $post, Set $set) {
                       foreach ($data['topics'] as $topic) {
                            $topic = $topic['title'];
                            GenerateAIContent::dispatch($topic);
                            Notification::make()
                            ->title('Sent " '.$topic.' " to queue. Post will generate within a minute.')
                                ->success()
                                ->send();
                       }

                    }),
            ])
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('title')->description(fn(Post $post): HtmlString => new HtmlString($post->excerpt))
                ->wrap(true),
                ImageColumn::make('featured_image')
                                ->disk('public')
                                ->label('Image'),
                SelectColumn::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->default('published')
                    ->sortable()
                    ->searchable()
                    ->selectablePlaceholder(false),

            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    ViewAction::make(),
                    DeleteAction::make(),
                ])->button()->label('Actions'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            PostOverview::class,
        ];
    }
    protected static function afterCreate(Form $form, Post $post): void
    {
        $categories = $form->getState()['categories'] ?? [];
        dd($categories);
        $post->categories()->sync($categories);
    }
}
