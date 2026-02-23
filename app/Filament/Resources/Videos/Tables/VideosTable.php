<?php

namespace App\Filament\Resources\Videos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('folder')
            ->columns([
                TextColumn::make('folder')
                    ->label('Folder')
                    ->searchable(),

                TextColumn::make('nama_file')
                    ->label('Nama Video')
                    ->state(fn ($record) => basename($record->video)),

                TextColumn::make('video')
                    ->label('Preview')
                    ->html()
                    ->alignCenter()
                    ->state(fn ($record) => '
<div style="
    width: 200px;
    height: 120px;
    border-radius: 16px;
    overflow: hidden;
    background: #000;
    box-shadow: 0 10px 25px rgba(0,0,0,.35);
">
    <video
        controls
        preload="metadata"
        style="
            width: 100%;
            height: 100%;
            object-fit: cover;
        "
    >
        <source src="'.asset('storage/'.$record->video).'" type="video/mp4">
    </video>
</div>
'),
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
            ]);
    }
}
