<?php

namespace App\Filament\Resources\Perpustakaans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PerpustakaansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('file_pdf')
                    ->label('E-book')
                    ->icon('heroicon-m-document'),
                ImageColumn::make('foto')
                    ->label('Foto Sampul')
                    ->disk('public')
                    ->visibility('public')
                    ->circular()
                    ->height(100),
                TextColumn::make('judul')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('penulis')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Upload')
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
