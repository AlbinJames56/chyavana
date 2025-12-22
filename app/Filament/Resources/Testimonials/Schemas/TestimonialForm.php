<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')->required()->columnSpan(1),
                TextInput::make('condition')->columnSpan(1),


                // TYPE: choose text or video
                Radio::make('type')
                    ->label('Testimonial type')
                    ->options([
                        'text' => 'Text testimonial',
                        'video' => 'Video testimonial',
                    ])
                    ->default('text')
                    ->inline()
                    ->reactive(),
                Grid::make(2)->schema([
                    Toggle::make('is_published')->label('Published')->default(true),
                    Toggle::make('featured')->label('Featured')->default(false),
                ]),
                // Text-only fields (visible when type == text)
                Textarea::make('quote')
                    ->label('Quote / Testimonial')
                    ->rows(4)
                    ->required()
                    ->hidden(fn($get) => $get('type') === 'video'),

                // Video-only fields (visible when type == video)

                FileUpload::make('video_file')
                    ->label('Upload video file (MP4/WebM)')
                    ->directory('testimonials/videos')
                    ->disk('public')
                    ->maxSize(51200) // 50 MB
                    ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                    ->helperText('Upload a portrait video for the testimonial.')
                    ->hidden(fn($get) => $get('type') === 'text'),

                // TextInput::make('video_url')
                //     ->label('External video URL (YouTube/Vimeo)')
                //     ->placeholder('https://youtu.be/xxxxx')
                //     ->helperText('If provided, external URL will be used instead of uploaded file.')
                //     ->hidden(fn($get) => $get('type') === 'text'),


                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('testimonials/thumbnails')
                    ->disk('public')
                    ->imagePreviewHeight('110')
                    ->helperText('Optional thumbnail shown on the card (recommended for videos).')
                    ->hidden(fn($get) => $get('type') === 'text'),



                TextInput::make('sort_order')->numeric()->label('Sort order')->helperText('Lower first'),
            ]);
    }
}
