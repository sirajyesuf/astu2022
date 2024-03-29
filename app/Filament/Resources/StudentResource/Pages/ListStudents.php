<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getTableQuery(): Builder
    {
        $user = auth()->user();
        if ($user->isAdministrator()) {

            return Student::query();
        }
        return Student::query()->where('user_id', auth()->id());
    }



    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('first_name')
                ->searchable(),
            Tables\Columns\TextColumn::make('last_name'),
            Tables\Columns\TextColumn::make('student_id')
                ->searchable(),
            Tables\Columns\TextColumn::make('last_word'),
            Tables\Columns\BadgeColumn::make('department.school.short_name')
                ->label('School'),
            Tables\Columns\BadgeColumn::make('department.short_name'),
            Tables\Columns\BadgeColumn::make('gown_image')
                ->label('Gown Image')
                ->colors([
                    'primary'
                ]),
            Tables\Columns\TagsColumn::make('images')
                ->label("Suit Images")


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

            Tables\Filters\SelectFilter::make('department_id')
                ->label('Department')
                ->options(Department::all()->pluck('short_name', 'id')->toArray()),
            Tables\Filters\SelectFilter::make('user_id')
                ->label('Editor')
                ->options(User::withTrashed()->pluck('name', 'id')->toArray())
                ->hidden(auth()->user()->isEditor())

        ];
    }
}
