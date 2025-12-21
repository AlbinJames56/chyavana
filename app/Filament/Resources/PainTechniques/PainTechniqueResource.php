<?php

namespace App\Filament\Resources\PainTechniques;

use App\Filament\Resources\PainTechniques\Pages\CreatePainTechnique;
use App\Filament\Resources\PainTechniques\Pages\EditPainTechnique;
use App\Filament\Resources\PainTechniques\Pages\ListPainTechniques;
use App\Filament\Resources\PainTechniques\Schemas\PainTechniqueForm;
use App\Filament\Resources\PainTechniques\Tables\PainTechniquesTable;
use App\Models\PainTechnique;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PainTechniqueResource extends Resource
{
    protected static ?string $model = PainTechnique::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PainTechnique';

    public static function form(Schema $schema): Schema
    {
        return PainTechniqueForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PainTechniquesTable::configure($table);
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
            'index' => ListPainTechniques::route('/'),
            'create' => CreatePainTechnique::route('/create'),
            'edit' => EditPainTechnique::route('/{record}/edit'),
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
