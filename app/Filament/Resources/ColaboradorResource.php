<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColaboradorResource\Pages;
use App\Models\Colaborador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ColaboradorResource extends Resource
{
    protected static ?string $model = Colaborador::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Colaboradores';
    protected static ?string $pluralModelLabel = 'Colaboradores';
    protected static ?string $modelLabel = 'Colaborador';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('nombres')
                        ->disabled(),
                        
                    Forms\Components\TextInput::make('apellidos')
                        ->disabled(),
                        
                    Forms\Components\TextInput::make('email')
                        ->disabled(),
                        
                    Forms\Components\DatePicker::make('fecha_nacimiento')
                        ->disabled(),
                        
                    Forms\Components\TextInput::make('genero')
                        ->disabled(),

                    // --- CAMPO EDITABLE 1: PUNTOS ---
                    Forms\Components\TextInput::make('puntos_acumulados')
                        ->numeric()
                        ->label('Puntos Ecológicos Acumulados')
                        ->required(),

                    Forms\Components\Toggle::make('estado')
                        ->label('Cuenta Activa (Permitir acceso al sistema)')
                        ->helperText('Si lo desactivas, el colaborador no podrá iniciar sesión en la web.')
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nombres')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('apellidos')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                
                Tables\Columns\TextColumn::make('puntos_acumulados')
                    ->label('Puntos')
                    ->badge()
                    ->color('success')
                    ->sortable(),
                    
                Tables\Columns\IconColumn::make('estado')
                    ->boolean()
                    ->label('Activo'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha Registro')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(), 
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ColaboradorResource\Pages\ListColaboradores::route('/'),
            'create' => \App\Filament\Resources\ColaboradorResource\Pages\CreateColaborador::route('/create'),
            'edit' => \App\Filament\Resources\ColaboradorResource\Pages\EditColaborador::route('/{record}/edit'),
        ];
    }
}