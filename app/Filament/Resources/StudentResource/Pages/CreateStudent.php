<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Models\Department;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use App\Models\School;
use App\Forms\Components\FileUpload;


class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        unset($data['school_id']);
        return $data;
    }



    protected function getFormSchema(): array
    {


        return [
            Forms\Components\Card::make()
                ->schema([

                    Forms\Components\TextInput::make('first_name')
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->required(),
                    Forms\Components\TextInput::make('student_id')
                        ->required()
                        ->unique(),
                    Forms\Components\Textarea::make('last_word')
                        ->required()
                        ->minLength(1)
                        ->maxLength(32)
                        ->cols(3)
                        ->rows(2)

                ])
                ->columns([
                    'sm' => 2,
                ]),
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
                    FileUpload::make('gown_image')
                        ->label('Gown Image')
                        ->required()
                        ->image()
                        ->directory('students'),
                    FileUpload::make('images')
                        ->label('Suit Images')
                        ->required()
                        ->directory('students')
                        ->multiple()
                        ->image()
                        ->enableReordering()
                        ->maxFiles(3)
                ])



        ];
    }
}
