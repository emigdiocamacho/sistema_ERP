<?php

namespace App\Filament\Admin\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255),
                // Selector múltiple que guarda automáticamente en company_user
                Select::make('users')
                    ->label('Assigned Users')
                    ->relationship('users', 'name') // 'users' es el nombre del método BelongsToMany en el modelo Company
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),
                
            ]);
    }
}
