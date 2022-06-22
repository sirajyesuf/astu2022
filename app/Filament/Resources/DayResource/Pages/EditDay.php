<?php

namespace App\Filament\Resources\DayResource\Pages;

use App\Filament\Resources\DayResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDay extends EditRecord
{
    protected static string $resource = DayResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
