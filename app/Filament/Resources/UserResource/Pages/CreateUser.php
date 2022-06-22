<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->unique(),
                    Forms\Components\Select::make('role_id')
                        ->label('role')
                        ->relationship('role', 'short_name')
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->required()
                        ->password()
                ])
                ->columns(2)

        ];
    }
}
