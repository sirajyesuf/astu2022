<?php

namespace App\Filament\Resources\DeptGroupPhotoResource\Pages;

use App\Filament\Resources\DeptGroupPhotoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;

class ListDeptGroupPhotos extends ListRecords
{
    protected static string $resource = DeptGroupPhotoResource::class;

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\BadgeColumn::make('department.short_name')
            ->label('Department'),
            Tables\Columns\TagsColumn::make('images')
            ->label('Images')
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

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
