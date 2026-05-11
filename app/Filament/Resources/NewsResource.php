<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            \Filament\Forms\Components\Section::make('Contenido de la Noticia')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('titulo')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $state, $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

                    \Filament\Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    \Filament\Forms\Components\FileUpload::make('imagen_portada')
                        ->image()
                        ->directory('noticias') 
                        ->required(),

                    \Filament\Forms\Components\Textarea::make('resumen')
                        ->required()
                        ->rows(3),

                    \Filament\Forms\Components\RichEditor::make('contenido')
                        ->required()
                        ->columnSpanFull(),
                    
                    \Filament\Forms\Components\DatePicker::make('fecha_publicacion')
                        ->default(now()),

                    \Filament\Forms\Components\Toggle::make('publicado')
                        ->default(true),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
       return $table
        ->columns([
            Tables\Columns\ImageColumn::make('imagen_portada')
                ->label('Portada')
                ->disk('public'), 

            Tables\Columns\TextColumn::make('titulo')
                ->label('Título')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('fecha_publicacion')
                ->label('Fecha')
                ->date('d/m/Y')
                ->sortable(),

            Tables\Columns\IconColumn::make('publicado')
                ->label('Estado')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Creado el')
                ->dateTime()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('publicado')
                ->label('Publicado'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
