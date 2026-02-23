<?php

namespace App\Filament\Resources\Videos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('folder')
                    ->label('Folder')
                    ->datalist(
                        fn () => DB::table('video')
                            ->whereNotNull('folder')
                            ->distinct()
                            ->pluck('folder')
                            ->toArray()
                    ),

                FileUpload::make('video')
                    ->label('Video')
                    ->disk('public')
                    ->directory('video')
                    ->visibility('public')
                    ->acceptedFileTypes([
                        'video/mp4',
                        'video/webm',
                        'video/ogg',
                        'video/quicktime', // mov
                    ])
                    ->maxSize(102400) // 100 MB (sesuaikan)
                    ->getUploadedFileNameForStorageUsing(
                        fn ($file) => time().'_'.
                            Str::slug(
                                pathinfo(
                                    $file->getClientOriginalName(),
                                    PATHINFO_FILENAME
                                )
                            )
                            .'.'.$file->getClientOriginalExtension()
                    )
                    ->required(),
            ]);
    }
}
