<?php

namespace App\Filament\Widgets;

use App\Models\Colaborador;
use App\Models\Actividad;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EcoEstadisticas extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            Stat::make('Colaboradores Activos', Colaborador::where('estado', true)->count())
                ->description('Ciudadanos participando en el programa')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('info'),

            Stat::make('Actividades Pendientes', Actividad::whereIn('estado', ['Programado', 'En Curso'])->count())
                ->description('Eventos y jornadas ecológicas vigentes')
                ->descriptionIcon('heroicon-m-calendar', IconPosition::Before)
                ->color('warning'),

            Stat::make('Puntos Ecológicos Emitidos', number_format(Colaborador::sum('puntos_acumulados')))
                ->description('Impacto de reciclaje acumulado global')
                ->descriptionIcon('heroicon-m-sparkles', IconPosition::Before)
                ->color('success'),
        ];
    }
}