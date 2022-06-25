<?php

namespace App\Filament\Resources\DeptGroupPhotoResource\Pages;

use App\Filament\Resources\DeptGroupPhotoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Forms\Components\FileUpload;
use Filament\Forms;
use App\Models\School;
use App\Models\Department;

class CreateDeptGroupPhoto extends CreateRecord
{
    protected static string $resource = DeptGroupPhotoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {


        unset($data['school_id']);
        return $data;
    }



    protected function getFormSchema(): array
    {


        return [
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Select::make('school_id')
                        ->label('School')
                        ->options(School::all()->pluck('long_name', 'id')->toArray())
                        ->reactive()
                        ->required()
                        ->afterStateUpdated(fn (callable $set) => $set('department_id', null)),
                    Forms\Components\Select::make('department_id')
                        ->label('Department')
                        ->required()
                        ->options(function (callable $get) {
                            $school = School::find($get('school_id'));
                            if (!$school) {
                                return Department::all()->pluck('long_name', 'id')->toArray();
                            }
                            return $school->departments->pluck('long_name', 'id');
                        }),
                ]),

            Forms\Components\Card::make()
                ->schema([
                    FileUpload::make('images')
                        ->label('Image')
                        ->directory('dept_group_photos')
                        ->multiple()
                        ->image()
                        ->enableReordering()
                        ->maxFiles(5)
                        ->required()
                ])



        ];
    }
}
