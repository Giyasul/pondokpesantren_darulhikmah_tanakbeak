<?php

namespace App\Filament\Resources\Beritas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BeritasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->rounded()
                    ->size(100),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('penulis')
                    ->label('Penulis')
                    ->searchable(),
                TextColumn::make('isi')
                    ->label('Isi')
                    ->limit(100)
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y'),

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
            ]);
    }
}
