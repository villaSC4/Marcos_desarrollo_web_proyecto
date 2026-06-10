<?php

namespace App\Filament\Resources\ActividadResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ColaboradoresRelationManager extends RelationManager
{
    // Nombre de la relación que definimos en el modelo Actividad
    protected static string $relationship = 'colaboradores';

    protected static ?string $title = 'Lista de Asistencia (Participantes Inscritos)';

    /**
     * Formulario que se abre al editar la asistencia de un participante específico
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('asistio')
                    ->label('¿Confirmar Asistencia?')
                    ->helperText('Marca este switch si el colaborador asistió al evento físico.')
                    ->default(false),
            ]);
    }

    /**
     * Tabla que lista a los participantes inscritos abajo de la actividad
     */
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombres')
            ->columns([
                Tables\Columns\TextColumn::make('nombres')->label('Nombres')->searchable(),
                Tables\Columns\TextColumn::make('apellidos')->label('Apellidos'),
                Tables\Columns\TextColumn::make('email')->label('Correo'),
                
                // Switch directo en la celda para pasar asistencia con un solo click
                Tables\Columns\ToggleColumn::make('asistio')
                    ->label('¿Asistió?')
                    ->afterStateUpdated(function ($record) {
                        // Opcional: Puedes meter logs aquí, pero Filament guarda en la tabla intermedia automáticamente
                    }),
            ])
            ->filters([])
            ->headerActions([
            ])
        
            ->bulkActions([]);
    }
}