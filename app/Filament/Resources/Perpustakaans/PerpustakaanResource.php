<?php

namespace App\Filament\Resources\Perpustakaans;

use App\Filament\Resources\Perpustakaans\Pages\CreatePerpustakaan;
use App\Filament\Resources\Perpustakaans\Pages\EditPerpustakaan;
use App\Filament\Resources\Perpustakaans\Pages\ListPerpustakaans;
use App\Filament\Resources\Perpustakaans\Schemas\PerpustakaanForm;
use App\Filament\Resources\Perpustakaans\Tables\PerpustakaansTable;
use App\Models\Perpustakaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerpustakaanResource extends Resource
{
    protected static ?string $model = Perpustakaan::class;

    protected static ?string $navigationLabel = 'Perpustakaan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Perpustakaan';

    public static function form(Schema $schema): Schema
    {
        return PerpustakaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerpustakaansTable::configure($table);
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
            'index' => ListPerpustakaans::route('/'),
            'create' => CreatePerpustakaan::route('/create'),
            'edit' => EditPerpustakaan::route('/{record}/edit'),
        ];
    }
}
