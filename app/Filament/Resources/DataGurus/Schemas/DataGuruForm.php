<?php

namespace App\Filament\Resources\DataGurus\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DataGuruForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Guru')
                    ->description('Informasi lengkap tenaga pendidik')
                    ->schema([
                        Grid::make(2)
                            ->schema([

                                TextInput::make('nama')
                                    ->label('Nama Guru')
                                    ->placeholder('Masukkan nama guru'),

                                FileUpload::make('foto')
                                    ->image()
                                    ->directory('guru')
                                    ->disk('public')
                                    ->imagePreviewHeight('150'),

                                TextInput::make('nik')
                                    ->label('NIK')
                                    ->placeholder('Nomor Induk Kependudukan'),

                                TextInput::make('nuptk')
                                    ->label('NUPTK'),

                                Select::make('jk')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan',
                                    ])
                                    ->placeholder('Pilih jenis kelamin'),

                                TextInput::make('tempat_lahir')
                                    ->placeholder('Tempat lahir'),

                                DatePicker::make('tanggal_lahir')
                                    ->label('Tanggal Lahir'),

                                TextInput::make('no_hp')
                                    ->label('Nomor HP')
                                    ->tel(),

                                TextInput::make('email')
                                    ->email(),

                                TextInput::make('mapel')
                                    ->label('Mapel yang Diampu'),

                                TextInput::make('penempatan')
                                    ->placeholder('Contoh: SMP / SMA'),
                            ]),
                    ])
                    ->columns(1),
            ]);
    }
}
