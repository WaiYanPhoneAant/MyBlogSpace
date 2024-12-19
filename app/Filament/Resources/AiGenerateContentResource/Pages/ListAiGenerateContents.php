<?php

namespace App\Filament\Resources\AiGenerateContentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Resources\AiGenerateContentResource;
use App\Filament\Resources\AiGenerateContentResource\Widgets\FailedJobOverview;

class ListAiGenerateContents extends ListRecords
{
    protected static string $resource = AiGenerateContentResource::class;
protected static ?string $recordTitleAttribute = 'name';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

      protected function getStats(): array
    {
        return [
            Stat::make('Unique views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Bounce rate', '21%')
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }

        public function getHeaderWidgetsColumns(): int | array
{
    return 1;
}
    protected function getFooterWidgets(): array
    {
        return [
            FailedJobOverview::class,
        ];
    }
}
