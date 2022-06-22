<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['password'] = Hash::make($data['password']);
        return $data;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->required()
                ->unique(ignorable: fn (?User $record): ?User => $record),
            Forms\Components\Select::make('role_id')
                ->label('Role')
                ->relationship('role', 'short_name')
                ->required(),
            Forms\Components\TextInput::make('password')
                ->required()
                ->password()

        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
