<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Day;
use App\Models\Event;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

 
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('day.name'),
            Tables\Columns\TagsColumn::make('images')
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    protected function getTableBulkActions(): array
    {
        if (auth()->user()->isAdministrator()) {

            return [
                Tables\Actions\DeleteBulkAction::make()
            ];
        }

        return [];
    }

    protected function getTableFilters(): array
    {
        return [

            Tables\Filters\SelectFilter::make('day_id')
                ->label('Day')
                ->options(Day::all()->pluck('name', 'id')->toArray())
        ];
    }
}
