<?php

namespace App\Filament\Resources\DataSiswas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DataSiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Santri')
                    ->description('Informasi lengkap santri')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama')
                                    ->label('Nama Santri'),

                                FileUpload::make('foto')
                                    ->image()
                                    ->directory('santri')
                                    ->disk('public')
                                    ->imagePreviewHeight('120'),

                                TextInput::make('nisn')
                                    ->label('NISN'),

                                TextInput::make('nik')
                                    ->label('NIK'),

                                TextInput::make('tempat_lahir')
                                    ->label('Tempat Lahir'),

                                DatePicker::make('tanggal_lahir')
                                    ->label('Tanggal Lahir'),

                                TextInput::make('kelas')
                                    ->label('Kelas'),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'aktif' => 'Aktif',
                                        'nonaktif' => 'Tidak Aktif',
                                        'lulus' => 'Sudah Lulus',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->placeholder('Pilih status'),

                                Select::make('jk')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan',
                                    ])
                                    ->placeholder('Pilih jenis kelamin'),

                                TextInput::make('alamat')
                                    ->label('Alamat')
                                    ->columnSpanFull(),

                                Select::make('kebutuhan_khusus')
                                    ->label('Kebutuhan Khusus')
                                    ->options([
                                        'tidak' => 'Tidak',
                                        'iya' => 'Iya',
                                    ])
                                    ->placeholder('Pilih kebutuhan khusus'),

                                TextInput::make('nama_ayah')
                                    ->label('Nama Ayah'),

                                TextInput::make('nama_ibu')
                                    ->label('Nama Ibu'),

                                TextInput::make('nama_wali')
                                    ->label('Nama Wali Siswa'),

                                TextInput::make('angkatan')
                                    ->label('Angkatan')
                                    ->placeholder('Contoh: 2024'),

                                Select::make('jenjang')
                                    ->label('Jenjang')
                                    ->options([
                                        'RA' => 'RA',
                                        'MI' => 'MI',
                                        'MTS' => 'MTS',
                                        'MA' => 'MA',
                                    ])
                                    ->native(false)
                                    ->placeholder('Pilih jenjang'),

                            ]),
                    ])
                    ->columns(1),
            ]);
    }
}
