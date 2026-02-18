<?php

namespace App\Filament\Resources\DataSiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataSiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->default(null),

                TextColumn::make('nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('nisn')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('nik')
                    ->toggleable(),

                BadgeColumn::make('jk')
                    ->label('JK')
                    ->colors([
                        'primary' => 'L',
                        'pink' => 'P',
                    ]),

                TextColumn::make('kelas')
                    ->toggleable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                    ])
                    ->toggleable(),

                BadgeColumn::make('kebutuhan_khusus')
                    ->label('Kebutuhan Khusus')
                    ->getStateUsing(fn ($record) => $record->kebutuhan_khusus)
                    ->colors([
                        'success' => true,
                        'danger' => false,
                    ]),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama');
    }
}
