<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Day;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use App\Forms\Components\FileUpload;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;




    protected function getFormSchema(): array
    {
        return  [
            Forms\Components\Select::make('day_id')
                ->label('day')
                ->options(Day::all()->pluck('name', 'id')),

            Forms\Components\Card::make()
                ->schema([
                    FileUpload::make('images')
                        ->label('Photos')
                        ->required()
                        ->hint('the first photo considered as featured photo.')
                        ->directory('events')
                        ->multiple()
                        ->image()
                        ->enableReordering()
                        ->maxFiles(20)
                ])
        ];
    }
}
