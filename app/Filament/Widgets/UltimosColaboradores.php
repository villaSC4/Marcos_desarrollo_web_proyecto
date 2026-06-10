<?php

namespace App\Filament\Widgets;

use App\Models\Colaborador;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UltimosColaboradores extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Últimos Colaboradores Registrados';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Colaborador::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('nombres')
                    ->label('Nombres')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('apellidos')
                    ->label('Apellidos'),
                    
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo Electrónico'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime('d/m/Y H:i'),
                    
                Tables\Columns\TextColumn::make('puntos_acumulados')
                    ->label('Puntos')
                    ->badge()
                    ->color('success'),
            ]);
    }
}