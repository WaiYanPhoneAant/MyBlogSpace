<?php

namespace App\Filament\Resources;

use App\Models\Job;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\AiGenerateContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AiGenerateContentResource\Pages;
use App\Filament\Resources\AiGenerateContentResource\RelationManagers;
use Faker\Provider\ar_EG\Text;
use Filament\Tables\Columns\TextColumn;

class AiGenerateContentResource extends Resource
{
    protected static ?string $model = Job::class;
    protected static ?string $navigationLabel = 'Ai-Generate Content';

    protected static ?string $label = 'Ai-Generate Content Queue';


    protected static ?string $navigationIcon = 'heroicon-m-square-3-stack-3d';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('1s')
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('queue')
                ->formatStateUsing(fn (string $state): string => __("{$state}")),
                TextColumn::make('reserved_at')
                ->label('Status')
                ->formatStateUsing(fn (Job $job) => $job->reserved_at !=null ? "Running" : "Pending")
                ->badge(true)
                ,
                // TextColumn::make('reserved_at')
                //         ->label('Reserved_at')->date('Y-m-d H:i:s'),
                TextColumn::make('available_at')->date('Y-m-d H:i:s'),
                TextColumn::make('created_at')->date('Y-m-d H:i:s'),
                // TextColumn::make('payload')->wrap(true),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAiGenerateContents::route('/'),
            // 'create' => Pages\CreateAiGenerateContent::route('/create'),
            // 'edit' => Pages\EditAiGenerateContent::route('/{record}/edit'),
        ];
    }
}
