<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use App\Filament\Resources\PostResource\Widgets\PostOverview;

class ListPosts extends ListRecords
{
    use ExposesTableToWidgets;
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
        public function getTabs(): array
        {
            return [
                'all' => Tab::make(),

                'Published  ' => Tab::make()
                    ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'published')),
                'Draft' => Tab::make()
                    ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('status', 'draft')),
                'Archived' => Tab::make()
                    ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'archived')),
            ];
        }

        
    protected function getHeaderWidgets(): array
    {
        return [
            PostOverview::class,
        ];
    }
}
