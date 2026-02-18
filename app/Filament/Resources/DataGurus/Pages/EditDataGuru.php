<?php

namespace App\Filament\Resources\DataGurus\Pages;

use App\Filament\Resources\DataGurus\DataGuruResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataGuru extends EditRecord
{
    protected static string $resource = DataGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
