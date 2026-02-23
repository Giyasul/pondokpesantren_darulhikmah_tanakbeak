<?php

namespace App\Filament\Resources\DataGurus;

use App\Filament\Resources\DataGurus\Pages\CreateDataGuru;
use App\Filament\Resources\DataGurus\Pages\EditDataGuru;
use App\Filament\Resources\DataGurus\Pages\ListDataGurus;
use App\Filament\Resources\DataGurus\Schemas\DataGuruForm;
use App\Filament\Resources\DataGurus\Tables\DataGurusTable;
use App\Models\DataGuru;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataGuruResource extends Resource
{
    protected static ?string $model = DataGuru::class;

    protected static ?string $navigationLabel = 'Data Guru';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Guru';

    public static function form(Schema $schema): Schema
    {
        return DataGuruForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataGurusTable::configure($table);
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
            'index' => ListDataGurus::route('/'),
            'create' => CreateDataGuru::route('/create'),
            'edit' => EditDataGuru::route('/{record}/edit'),
        ];
    }
}
