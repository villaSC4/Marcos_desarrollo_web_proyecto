<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActividadResource\RelationManagers;
use App\Filament\Resources\ActividadResource\Pages;
use App\Models\Actividad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActividadResource extends Resource
{
    protected static ?string $model = Actividad::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Actividades / Eventos';
    protected static ?string $pluralModelLabel = 'Actividades';
    protected static ?string $modelLabel = 'Actividad';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->maxLength(255),
                        
                    Forms\Components\TextInput::make('puntos_otorgados')
                        ->numeric()
                        ->label('Puntos otorgados por asistir')
                        ->required(),
                    
                    Forms\Components\TextInput::make('direccion')
                        ->label('Dirección del Evento')
                        ->placeholder('Ej. Av. Gran Chimú')
                        ->maxLength(255),
                        
                    Forms\Components\DatePicker::make('fecha_activity')
                        ->label('Fecha del Evento')
                        ->required(),
                        
                    Forms\Components\Select::make('estado')
                        ->options([
                            'Programado' => 'Programado',
                            'En Curso' => 'En Curso',
                            'Finalizado' => 'Finalizado',
                        ])
                        ->required(),

                    Forms\Components\Textarea::make('descripcion')
                        ->columnSpanFull()
                        ->rows(4),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nombre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('puntos_otorgados')->label('Puntos')->sortable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->label('Lugar')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('fecha_activity')->label('Fecha')->date('d/m/Y')->sortable(),
                Tables\Columns\TextColumn::make('estado')->badge()->color(fn (string $state): string => match ($state) {
                    'Programado' => 'info',
                    'En Curso' => 'warning',
                    'Finalizado' => 'success',
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ColaboradoresRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ActividadResource\Pages\ListActividads::route('/'),
            'create' => \App\Filament\Resources\ActividadResource\Pages\CreateActividad::route('/create'),
            'edit' => \App\Filament\Resources\ActividadResource\Pages\EditActividad::route('/{record}/edit'),
        ];
    }
}