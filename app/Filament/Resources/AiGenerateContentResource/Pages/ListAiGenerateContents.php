<?php

namespace App\Filament\Resources\AiGenerateContentResource\Pages;

use App\Filament\Resources\AiGenerateContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
}
