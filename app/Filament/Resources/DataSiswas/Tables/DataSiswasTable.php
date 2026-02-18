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
                // FOTO
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('/image/logo.jpeg')),

                // NAMA
                TextColumn::make('nama')
                    ->label('Nama Santri')
                    ->searchable()
                    ->weight('bold'),

                // NISN
                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->toggleable(),

                // NIK
                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->toggleable(),

                // JK
                BadgeColumn::make('jk')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'L',
                        'pink' => 'P',
                    ]),

                // JENJANG
                BadgeColumn::make('jenjang')
                    ->label('Jenjang')
                    ->colors([
                        'info' => 'RA',
                        'success' => 'MI',
                        'warning' => 'MTS',
                        'danger' => 'MA',
                    ])
                    ->toggleable(),

                // KELAS
                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->searchable()
                    ->toggleable(),

                // ANGKATAN
                TextColumn::make('angkatan')
                    ->label('Angkatan')
                    ->toggleable(),

                // STATUS
                BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Tidak Aktif',
                        'lulus' => 'Sudah Lulus',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'aktif',
                        'danger' => 'nonaktif',
                        'warning' => 'lulus',
                    ])
                    ->toggleable(),

                BadgeColumn::make('kebutuhan_khusus')
                    ->label('Kebutuhan Khusus')
                    ->formatStateUsing(fn ($state) => $state ? 'Iya' : 'Tidak')
                    ->colors([
                        'success' => true,
                        'gray' => false,
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
