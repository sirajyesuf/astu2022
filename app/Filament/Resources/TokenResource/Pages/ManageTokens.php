<?php

namespace App\Filament\Resources\TokenResource\Pages;

use App\Filament\Resources\TokenResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Str;

class ManageTokens extends ManageRecords
{
    protected static string $resource = TokenResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function revokeToken($record)
    {
        $record->update([
            'token' => Str::random(30)
        ]);
    }
}
