<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    // Icono que aparecerá en la barra lateral izquierda del panel
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    
    protected static ?string $navigationLabel = 'Productos de Canje';
    protected static ?string $modelLabel = 'Producto';
    protected static ?string $pluralModelLabel = 'Productos';

   public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Producto')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ej: Shampoo, Tomatodo Ecológico'),

                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->rows(3)
                            ->placeholder('Describe brevemente el producto o sus beneficios...'),

                        TextInput::make('costo_puntos')
                            ->label('Costo en Puntos')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0)
                            ->placeholder('Ej: 25'),

                        TextInput::make('stock')
                            ->label('Stock Disponible')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0)
                            ->placeholder('Ej: 50'),

                        FileUpload::make('imagen')
                            ->label('Imagen del Producto')
                            ->image() // Valida que solo suban imágenes (png, jpg, jpeg)
                            ->directory('productos') // Se guardará en storage/app/public/productos
                            ->imageCropAspectRatio('1:1') // Forzar formato cuadrado para que encaje perfecto en tus círculos CSS
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('imagen')
                    ->label('Foto')
                    ->circular(), // Vista previa circular en la tabla administrativa

                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('costo_puntos')
                    ->label('Puntos Necesarios')
                    ->sortable()
                    ->badge()
                    ->color('success'), // Lo resalta en verde elegante

                TextColumn::make('stock')
                    ->label('Stock Actual')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Fecha Registro')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Aquí puedes agregar filtros más adelante si los necesitas
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
        return [
            // Aquí puedes enlazar la relación con la tabla Canjes en el futuro
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}