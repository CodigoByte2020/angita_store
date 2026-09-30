<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('category', 'nombre')
                    ->label('Categoría')
                    ->required(),
                TextInput::make('precio_venta')
                    ->required()
                    ->numeric(),
                TextInput::make('descripcion')
                    ->columnSpanFull(),
            ]);
    }
}
