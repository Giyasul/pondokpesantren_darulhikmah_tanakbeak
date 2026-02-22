<?php

namespace App\Filament\Resources\DataGurus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataGurusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public')
                    ->circular()
                    ->defaultImageUrl(url('/image/logo.jpeg')),

                TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('nik')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('nuptk')
                    ->searchable()
                    ->toggleable(),

                BadgeColumn::make('jk')
                    ->label('JK')
                    ->colors([
                        'primary' => 'L',
                        'pink' => 'P',
                    ]),

                TextColumn::make('mapel')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('penempatan')
                    ->searchable()
                    ->badge()
                    ->color('success')
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                deleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama');
    }
}
