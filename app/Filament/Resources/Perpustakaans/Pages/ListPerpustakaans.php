<?php

namespace App\Filament\Resources\Perpustakaans\Pages;

use App\Filament\Resources\Perpustakaans\PerpustakaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPerpustakaans extends ListRecords
{
    protected static string $resource = PerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
