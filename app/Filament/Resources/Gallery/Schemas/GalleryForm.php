<?php

namespace App\Filament\Resources\Gallery\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Title')
                    ->columnSpan(2),

                Radio::make('type')
                    ->options([
                        'image' => 'Image',
                        'video' => 'Video',
                    ])
                    ->default('image')
                    ->inline()
                    ->reactive()
                    ->required(),

                TextInput::make('category')
                    ->label('Category')
                    ->placeholder('e.g., Retreat, Treatments, Facilities')
                    ->columnSpan(1),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->columnSpan(1),

                // Image Field
                FileUpload::make('image')
                    ->image()
                    ->directory('gallery/images')
                    ->disk('public')
                    ->imageEditor()
                    ->required(fn($get) => $get('type') === 'image')
                    ->hidden(fn($get) => $get('type') === 'video')
                    ->columnSpan(2),

                // Video Fields
                TextInput::make('video_url')
                    ->label('Video URL (YouTube/Vimeo)')
                    ->activeUrl()
                    ->required(fn($get) => $get('type') === 'video')
                    ->hidden(fn($get) => $get('type') === 'image')
                    ->columnSpan(2),

                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('gallery/thumbnails')
                    ->disk('public')
                    ->label('Video Thumbnail (Optional)')
                    ->hidden(fn($get) => $get('type') === 'image')
                    ->columnSpan(2),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
