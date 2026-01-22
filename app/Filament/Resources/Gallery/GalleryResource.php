<?php

namespace App\Filament\Resources\Gallery;

use App\Filament\Resources\Gallery\Pages\CreateGallery;
use App\Filament\Resources\Gallery\Pages\EditGallery;
use App\Filament\Resources\Gallery\Pages\ListGalleries;
use App\Filament\Resources\Gallery\Schemas\GalleryForm;
use App\Filament\Resources\Gallery\Tables\GalleryTable;
use App\Models\Gallery;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|\UnitEnum|null $navigationGroup = 'Content Management';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGalleries::route('/'),
            'create' => CreateGallery::route('/create'),
            'edit' => EditGallery::route('/{record}/edit'),
        ];
    }
}
