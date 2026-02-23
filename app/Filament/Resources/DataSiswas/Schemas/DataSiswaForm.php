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

                                Select::make('jk')
                                    ->label('Jenis Kelamin')
                                    ->options([
                                        'L' => 'Laki-laki',
                                        'P' => 'Perempuan',
                                    ])
                                    ->placeholder('Pilih jenis kelamin'),

                                TextInput::make('alamat')
                                    ->label('Alamat'),

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

                                Select::make('jenjang')
                                    ->label('Jenjang')
                                    ->options([
                                        'RA' => 'RA',
                                        'MI' => 'MI',
                                        'MTS' => 'MTS',
                                        'MA' => 'MA',
                                    ])
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('kelas', null);
                                    })
                                    ->placeholder('Pilih jenjang'),

                                Select::make('kelas')
                                    ->label('Kelas')
                                    ->options(function (callable $get) {
                                        $jenjang = $get('jenjang');

                                        return match ($jenjang) {
                                            'RA' => [
                                                'kelas 1' => 'Kelas 1',
                                                'kelas 2' => 'Kelas 2',
                                            ],
                                            'MI' => [
                                                'kelas 1' => 'Kelas 1',
                                                'kelas 2' => 'Kelas 2',
                                                'kelas 3' => 'Kelas 3',
                                                'kelas 4' => 'Kelas 4',
                                                'kelas 5' => 'Kelas 5',
                                                'kelas 6' => 'Kelas 6',
                                            ],
                                            'MTS' => [
                                                'kelas 7' => 'Kelas 7',
                                                'kelas 8' => 'Kelas 8',
                                                'kelas 9' => 'Kelas 9',
                                            ],
                                            'MA' => [
                                                'kelas 10' => 'Kelas 10',
                                                'kelas 11' => 'Kelas 11',
                                                'kelas 12' => 'Kelas 12',
                                            ],
                                            default => [],
                                        };
                                    })
                                    ->placeholder('Pilih kelas')
                                    ->reactive(),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'aktif' => 'Aktif',
                                        'nonaktif' => 'Tidak Aktif',
                                        'lulus' => 'Sudah Lulus',
                                    ])
                                    ->native(false)
                                    ->placeholder('Pilih status'),

                                TextInput::make('angkatan')
                                    ->label('Angkatan')
                                    ->placeholder('Contoh: 2024'),

                            ]),
                    ])
                    ->columns(1),
            ]);
    }
}
