<?php

namespace App\Filament\Resources\DataSiswas;

use App\Filament\Resources\DataSiswas\Pages\CreateDataSiswa;
use App\Filament\Resources\DataSiswas\Pages\EditDataSiswa;
use App\Filament\Resources\DataSiswas\Pages\ListDataSiswas;
use App\Filament\Resources\DataSiswas\Schemas\DataSiswaForm;
use App\Filament\Resources\DataSiswas\Tables\DataSiswasTable;
use App\Models\DataSiswa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataSiswaResource extends Resource
{
    protected static ?string $model = DataSiswa::class;

    protected static ?string $navigationLabel = 'Data Santri';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Siswa';

    public static function form(Schema $schema): Schema
    {
        return DataSiswaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataSiswasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataSiswas::route('/'),
            'create' => CreateDataSiswa::route('/create'),
            'edit' => EditDataSiswa::route('/{record}/edit'),
        ];
    }
}
