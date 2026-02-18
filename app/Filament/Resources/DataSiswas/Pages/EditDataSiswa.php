<?php

namespace App\Filament\Resources\DataSiswas\Pages;

use App\Filament\Resources\DataSiswas\DataSiswaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataSiswa extends EditRecord
{
    protected static string $resource = DataSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
