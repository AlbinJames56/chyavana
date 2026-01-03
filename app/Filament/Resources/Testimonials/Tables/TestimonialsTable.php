<?php

namespace App\Filament\Resources\Testimonials\Tables;

use App\Models\Testimonial;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([

                // Thumbnail (video/text)
                ImageColumn::make('thumbnail')
                    ->disk('public')
                    ->square()
                    ->toggleable(),

                // Name
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                // Type: Text / Video
                BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'text',
                        'success' => 'video',
                    ])
                    ->icons([
                        'heroicon-o-chat-bubble-left-ellipsis' => 'text',
                        'heroicon-o-video-camera' => 'video',
                    ])
                    ->sortable(),

                // Condition
                TextColumn::make('condition')
                    ->toggleable()
                    ->sortable(),

                // Improvement
                TextColumn::make('improvement')
                    ->label('Improvement')
                    ->toggleable()
                    ->sortable(),

                // Duration
                TextColumn::make('duration')
                    ->toggleable()
                    ->sortable(),

                // Flags
                BooleanColumn::make('featured')
                    ->label('Featured')
                    ->sortable(),

                BooleanColumn::make('is_published')
                    ->label('Published')
                    ->sortable(),

                // Video indicator (extra clarity)
                IconColumn::make('has_video')
                    ->label('Video')
                    ->boolean()
                    ->trueIcon('heroicon-o-video-camera')
                    ->falseIcon('heroicon-o-minus')
                    ->getStateUsing(fn(Testimonial $record) => $record->type === 'video'),

                // Created
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),

                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(fn() => url('/pain-relief') . '#testimonials')
                    ->openUrlInNewTab()
                    ->tooltip('Preview testimonials on website'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
