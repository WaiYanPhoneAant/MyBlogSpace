<?php

namespace App\Filament\Resources\AiGenerateContentResource\Widgets;

use Filament\Tables;
use App\Models\FailedJob;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Tables\Actions\DeleteFailedJob;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Infolists\Components\TextEntry;
use Filament\Widgets\TableWidget as BaseWidget;

class FailedJobOverview extends BaseWidget
{
        protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                FailedJob::query()
            )
            ->columns([
                TextColumn::make('uuid'),
                TextColumn::make('exception')->limit(50),
                TextColumn::make('connection'),
                TextColumn::make('queue'),
                TextColumn::make('failed_at')->date('Y-m-d H:i:s'),

            ])
            ->actions([
                ViewAction::make()->infolist([
                    TextEntry::make('exception'),
                ]),

                    DeleteAction::make(),
            ])
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

}
