<?php

namespace App\Utiliteis;

use Filament\Forms\Set;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;

class CategoryUtil
{
    public static function form(): mixed
    {
        return [
            TextInput::make('name')
                    ->required()
                    ->placeholder('Enter the category name')
                    ->rules(['required', 'string', 'max:255'])
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $slug = Str::slug($state);
                        $uniqueSlug = $slug;
                        $counter = 1;
                        while (Category::where('slug', $uniqueSlug)->exists()) {
                            $uniqueSlug = $slug . '-' . $counter++;
                        }
                        $set('slug', $uniqueSlug);
                })->autofocus(),
                TextInput::make('description')
                    ->placeholder('Enter the category description')
                    ->rules(['nullable', 'string']),
                Hidden::make('slug'),
        ];
    }
}
