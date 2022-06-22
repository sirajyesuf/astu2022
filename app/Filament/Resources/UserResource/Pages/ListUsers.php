<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;


    protected function getTableQuery(): Builder
    {
   
        return User::query()->whereHas(
            'role',
            function ($query) {
                $query->where('short_name', 'editor');
            }
        );
    }


    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TagsColumn::make('role')
            
        ];
    }


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
