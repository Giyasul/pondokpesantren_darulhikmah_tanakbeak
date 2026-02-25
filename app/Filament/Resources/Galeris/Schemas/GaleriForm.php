<?php

namespace App\Filament\Resources\Galeris\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('folder')
                    ->label('Folder')
                    ->datalist(
                        fn () => DB::table('galeri')
                            ->whereNotNull('folder')
                            ->distinct()
                            ->pluck('folder')
                            ->toArray()
                    ),
                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->multiple()
                    ->disk('public')
                    ->directory('galeri')
                    ->visibility('public')
                    ->maxFiles(20)
                    ->reorderable()
                    ->appendFiles()
                    ->imagePreviewHeight('150')
                    ->getUploadedFileNameForStorageUsing(
                        fn ($file) => time().'_'.
                            Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                            .'.'.$file->getClientOriginalExtension()
                    )
                    ->required(),
            ]);
    }
}
