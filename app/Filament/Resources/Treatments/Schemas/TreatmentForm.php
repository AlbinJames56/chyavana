<?php

namespace App\Filament\Resources\Treatments\Schemas;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Forms;

class TreatmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('title')->required()->reactive()->columnSpanFull(),
                                        TextInput::make('slug')
                                            ->unique(ignoreRecord: true)
                                            ->helperText('Leave empty to auto-generate from title.'),
                                        TextInput::make('icon')->placeholder('e.g. brain, droplets'),
                                        TextInput::make('category')->placeholder('e.g. mental, digestive'),
                                        Forms\Components\Slider::make('effectiveness')
                                            ->minValue(0)
                                            ->maxValue(100)
                                            ->required(),
                                        Repeater::make('includes')
                                            ->label('Includes (bullets)')
                                            ->schema([
                                                TextInput::make('value')->required()->columnSpanFull()
                                            ])
                                            ->columns(1)
                                            ->collapsible()
                                            ->createItemButtonLabel('Add include'),
                                        Select::make('status')
                                            ->options([
                                                'published' => 'Published',
                                                'draft' => 'Draft',
                                            ])
                                            ->default('published')
                                            ->required(),
                                        TextInput::make('sort_order')->numeric(),
                                    ])
                            ]),
                        Tabs\Tab::make('Content Sections')
                            ->schema([
                                RichEditor::make('content_section_1')
                                    ->label('Section 1 - HTML content')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'link', 'h2', 'h3', 'blockquote', 'code', 'bulletList', 'orderedList', 'table'
                                    ])
                                    ->columnSpanFull(),
                                TextInput::make('content_section_title_1')->label('Section 1 Title'),
                                RichEditor::make('content_section_2')
                                    ->label('Section 2 - HTML content')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'link', 'h2', 'h3', 'blockquote', 'code', 'bulletList', 'orderedList', 'table'
                                    ])
                                    ->columnSpanFull(),
                                TextInput::make('content_section_title_2')->label('Section 2 Title'),
                                RichEditor::make('content_section_3')
                                    ->label('Section 3 - HTML content')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'link', 'h2', 'h3', 'blockquote', 'code', 'bulletList', 'orderedList', 'table'
                                    ])
                                    ->columnSpanFull(),
                                TextInput::make('content_section_title_3')->label('Section 3 Title'),
                            ]),
                        Tabs\Tab::make('Media')
                            ->schema([
                                FileUpload::make('image')
                                    ->disk('public')
                                    ->directory('treatments')
                                    ->image()
                                    ->visibility('public'),
                                TextInput::make('image_alt')->label('Image alt text')
                            ]),
                        Tabs\Tab::make('SEO')
                            ->schema([
                                TextInput::make('seo_title')->maxLength(70),
                                Textarea::make('seo_description')->maxLength(320),
                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->placeholder('Enter keywords and press enter'),
                                TextInput::make('canonical_url')->placeholder('https://example.com/treatment/slug'),
                                Select::make('meta_robots')
                                    ->label('Robots')
                                    ->options([
                                        'index,follow' => 'index,follow',
                                        'noindex,follow' => 'noindex,follow',
                                        'index,nofollow' => 'index,nofollow',
                                        'noindex,nofollow' => 'noindex,nofollow',
                                    ])
                                    ->nullable(),
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }
}
