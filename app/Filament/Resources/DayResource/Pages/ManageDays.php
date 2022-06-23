<?php

namespace App\Filament\Resources\DayResource\Pages;

use App\Filament\Resources\DayResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDays extends ManageRecords
{
    protected static string $resource = DayResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
