<?php

namespace App\Filament\Resources\Doctors;

use App\Filament\Resources\Doctors\Pages\CreateDoctors;
use App\Filament\Resources\Doctors\Pages\EditDoctors;
use App\Filament\Resources\Doctors\Pages\ListDoctors;
use App\Filament\Resources\Doctors\Schemas\DoctorsForm;
use App\Filament\Resources\Doctors\Tables\DoctorsTable;
use App\Models\Doctors;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorsResource extends Resource
{
    protected static ?string $model = Doctors::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Doctors';

    public static function form(Schema $schema): Schema
    {
        return DoctorsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DoctorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDoctors::route('/'),
            'create' => CreateDoctors::route('/create'),
            'edit' => EditDoctors::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
