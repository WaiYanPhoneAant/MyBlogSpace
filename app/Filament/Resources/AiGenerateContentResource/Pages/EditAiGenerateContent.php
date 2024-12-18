<?php

namespace App\Filament\Resources\AiGenerateContentResource\Pages;

use App\Filament\Resources\AiGenerateContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAiGenerateContent extends EditRecord
{
    protected static string $resource = AiGenerateContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
