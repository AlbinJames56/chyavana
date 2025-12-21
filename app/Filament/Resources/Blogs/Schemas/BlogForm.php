<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->reactive()
                    ->afterStateUpdated(fn($state, $set) => $set('slug', \Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('author'),
                DatePicker::make('published_at')->label('Published date'),
                FileUpload::make('image')->image()->directory('blogs')->disk('public'),
                Textarea::make('excerpt')->rows(3),
                RichEditor::make('content')->toolbarButtons([
                    'bold',
                    'italic',
                    'link',
                    'bulletList',
                    'orderedList',
                    'h2',
                    'h3'
                ])->columnSpan(2),
                Toggle::make('is_published')->label('Published')->default(true),
            ]);
    }
}
