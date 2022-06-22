<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use App\Models\Day;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
