<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
                    ->disabled(),

              TextInput::make('phone')
                    ->disabled(),

                TextInput::make('email')
                    ->disabled(),

                DatePicker::make('preferred')
                    ->label('Preferred Date')
                    ->disabled(),

                TextInput::make('therapy_slug')
                    ->label('Therapy')
                    ->disabled(),

                 Textarea::make('notes')
                    ->rows(4)
                    ->disabled(),

              TextInput::make('source_page')
                    ->label('Source Page')
                    ->disabled(),
            ]);
    }
}
