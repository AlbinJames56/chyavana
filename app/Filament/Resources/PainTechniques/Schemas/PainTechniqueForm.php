<?php

namespace App\Filament\Resources\PainTechniques\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Str;

class PainTechniqueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                // Image Upload
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('pain-techniques')
                    ->image()
                    ->maxSize(3072) 
                    ->visibility('public'),

                // Duration field
                TextInput::make('duration')
                    ->placeholder('e.g., 6–10 sessions'),

                // Content section 1
                RichEditor::make('description')
                    ->label('Content Section 1')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3'
                    ])
                    ->columnSpanFull(),

                // Content section 2
                RichEditor::make('more_info')
                    ->label('Content Section 2')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3'
                    ])
                    ->columnSpanFull(),

                // Benefits (JSON)
                Repeater::make('benefits')
                    ->label('Benefits')
                    ->schema([
                        TextInput::make('value')->label('Benefit'),
                    ])
                    ->default([])
                    ->minItems(0)
                    ->columnSpanFull(),

                // Toggles
                Toggle::make('featured')
                    ->label('Featured')
                    ->default(false),

                Toggle::make('available')
                    ->label('Available')
                    ->default(true),
            ]);
    }
}
