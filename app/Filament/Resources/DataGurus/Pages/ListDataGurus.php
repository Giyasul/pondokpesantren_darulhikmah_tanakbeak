<?php

namespace App\Filament\Resources\DataGurus\Pages;

use App\Filament\Resources\DataGurus\DataGuruResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataGurus extends ListRecords
{
    protected static string $resource = DataGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
