<?php

namespace App\Filament\Resources\SchoolResource\Pages;

use App\Filament\Resources\SchoolResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;

class EditSchool extends EditRecord
{
    protected static string $resource = SchoolResource::class;

    protected function getFormSchema(): array
    {
        return  [

            Forms\Components\TextInput::make('short_name'),
            Forms\Components\TextInput::make('long_name'),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
