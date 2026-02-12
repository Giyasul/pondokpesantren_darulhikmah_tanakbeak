<?php

namespace App\Filament\Resources\Perpustakaans\Pages;

use App\Filament\Resources\Perpustakaans\PerpustakaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerpustakaan extends EditRecord
{
    protected static string $resource = PerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
