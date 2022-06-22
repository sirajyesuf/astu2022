<?php

namespace App\Filament\Resources\SchoolResource\Pages;

use App\Filament\Resources\SchoolResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListSchools extends ListRecords
{
    protected static string $resource = SchoolResource::class;

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('long_name'),
            Tables\Columns\TextColumn::make('short_name')
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
