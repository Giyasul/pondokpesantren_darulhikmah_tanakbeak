<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required(),
                TextInput::make('penulis')
                    ->label('Penulis')
                    ->required(),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('berita')
                    ->disk('public')
                    ->required(),
                Textarea::make('isi')
                    ->label('Isi')
                    ->required()
                    ->rows(10),
            ]);
    }
}
