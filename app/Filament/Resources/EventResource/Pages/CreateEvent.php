<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Day;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }


    protected function getFormSchema(): array
    {
        return  [
            Forms\Components\Select::make('day_id')
                ->label('day')
                ->options(Day::all()->pluck('name', 'id')),

            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\FileUpload::make('images')
                        ->label('Photos')
                        ->hint('the first photo considered as featured photo.')
                        ->directory('/events')
                        ->multiple()
                        ->image()
                        ->enableReordering()
                        ->maxFiles(20)
                ])
        ];
    }
}
