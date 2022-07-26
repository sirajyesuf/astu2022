<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Day;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use App\Forms\Components\FileUpload;
use App\Models\Event;
use Illuminate\Support\Arr;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;




    protected function getFormSchema(): array
    {

        $numbers = range(1, (int)env('MAX_CHRONOLOGY_NUMBER'));
        $alread_taken_numbers = Event::all()->pluck('order')->all();
        $available = Arr::except($numbers,$alread_taken_numbers);


        return  [
            Forms\Components\Select::make('day_id')
                ->label('day')
                ->options(
                    Day::doesntHave('event')->get()
                        ->pluck('name', 'id')
                        ->toArray()

                )
                ->unique()
                ->required(),
            Forms\Components\Select::make('order')
                ->label('Chronology')
                ->options($available),

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
