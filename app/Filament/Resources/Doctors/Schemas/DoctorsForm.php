<?php

namespace App\Filament\Resources\Doctors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Str;

class DoctorsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('qualification')
                    ->placeholder('BAMS, MD (Ayurveda)'),

                // specialties: store as array of strings
                Repeater::make('specialties')
                    ->label('Specialties')
                    ->schema([
                        TextInput::make('value')->label('Specialty')->required(),
                    ])
                    ->mutateDehydratedStateUsing(fn($state) => collect($state)->pluck('value')->toArray())
                    ->default([])
                    ->columns(1)
                    ->helperText('Add specialties like Panchakarma, Stress Management, etc.'),

                TextInput::make('experience')
                    ->placeholder('e.g., 12 years'),
                TextInput::make('patients')
                    ->placeholder('e.g., 2,500+'),

                FileUpload::make('image')
                    ->image()
                    ->directory('doctors')
                    ->disk('public')
                    ->maxSize(3072),

                RichEditor::make('approach')
                    ->label('Approach / Bio')
                    ->toolbarButtons(['bold', 'italic', 'link', 'bulletList', 'orderedList', 'h2', 'h3'])
                    ->nullable(),

                Toggle::make('featured')->label('Featured')->default(false),
                Toggle::make('available')->label('Available')->default(true),
            ]);
    }
}
