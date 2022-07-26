<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use App\Models\Day;
use App\Forms\Components\FileUpload;
use App\Models\Event;
use Illuminate\Support\Arr;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;




    protected function getFormSchema(): array
    {


        $numbers = range(1, (int)env('MAX_CHRONOLOGY_NUMBER'));
        $alread_taken_numbers = Event::where('order','!=',$this->record->order)->get()->pluck('order')->all();
        $available = Arr::except($numbers, $alread_taken_numbers);

        return  [

            Forms\Components\Select::make('day_id')
                ->label('day')
                ->options(
                    Day::has('event')->get()
                        ->pluck('name', 'id')
                        ->toArray()
                )
                ->required()
                ->default(Day::find($this->record->day_id)->id)
                ->disablePlaceholderSelection()
                ->disabled(),
            Forms\Components\Select::make('order')
                ->label('Chronology')
                ->options($available)
                ->disablePlaceholderSelection(),


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

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
