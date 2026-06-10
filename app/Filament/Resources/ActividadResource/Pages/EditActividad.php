<?php

namespace App\Filament\Resources\ActividadResource\Pages;

use App\Filament\Resources\ActividadResource;
use Filament\Resources\Pages\EditRecord;

class EditActividad extends EditRecord
{
    protected static string $resource = ActividadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }
    
    protected function afterSave(): void
    {
        $actividad = $this->record;

        if ($actividad->estado === 'Finalizado') {
            
            $participantesAsistieron = $actividad->colaboradores()->wherePivot('asistio', true)->get();

            foreach ($participantesAsistieron as $colaborador) {
                
                $colaborador->puntos_acumulados += $actividad->puntos_otorgados;
                $colaborador->save();
            }

        }
    }
}