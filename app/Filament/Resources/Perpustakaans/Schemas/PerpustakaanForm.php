<?php

namespace App\Filament\Resources\Perpustakaans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PerpustakaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('penulis')
                    ->required(),
                TextInput::make('judul')
                    ->required(),
                FileUpload::make('file_pdf')
                    ->label('Upload E-book (PDF)')
                    ->required()
                    ->directory('ebook')
                    ->disk('public')
                    ->maxSize(10240)
                    ->acceptedFileTypes(['application/pdf']),
                FileUpload::make('foto')
                    ->label('Upload Foto Sampul')
                    ->required()
                    ->directory('perpustakaan')
                    ->disk('public')
                    ->maxSize(5120)
                    ->image(),
            ]);
    }
}
