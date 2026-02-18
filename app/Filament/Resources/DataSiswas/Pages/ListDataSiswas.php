<?php

namespace App\Filament\Resources\DataSiswas\Pages;

use App\Filament\Resources\DataSiswas\DataSiswaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataSiswas extends ListRecords
{
    protected static string $resource = DataSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
