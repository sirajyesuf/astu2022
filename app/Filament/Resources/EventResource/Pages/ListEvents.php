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

    protected function getTableQuery(): Builder
    {
        return Event::query()->where('user_id', auth()->id());
    }

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

    protected function getTableFilters(): array
    {
        return [

            Tables\Filters\SelectFilter::make('day_id')
                ->label('Day')
                ->options(Day::all()->pluck('name', 'id')->toArray()),
            Tables\Filters\SelectFilter::make('user_id')
                ->label('user')
                ->options(User::all()->pluck('name', 'id')->toArray())
                ->hidden(auth()->user()->isEditor())

        ];
    }
}
