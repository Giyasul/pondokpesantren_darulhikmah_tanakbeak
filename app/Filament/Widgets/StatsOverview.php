<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\DataGuru;
use App\Models\DataSiswa;
use App\Models\Galeri;
use App\Models\Perpustakaan;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Berita::count())
                ->description('Jumlah berita')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),

            Stat::make('Total Galeri', Galeri::count())
                ->description('Jumlah galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('info'),
            Stat::make('Total User', User::count())
                ->description('Jumlah user')
                ->descriptionIcon('heroicon-m-users')
                ->color('danger'),
            Stat::make('Total E-book', Perpustakaan::count())
                ->description('Jumlah e-book')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning'),
            Stat::make('Total Santri', DataSiswa::count())
                ->description('Jumlah santri')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),
            Stat::make('Total Guru', DataGuru::count())
                ->description('Jumlah guru')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('secondary'),
        ];
    }
}
