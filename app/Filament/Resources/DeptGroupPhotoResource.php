<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeptGroupPhotoResource\Pages;
use App\Filament\Resources\DeptGroupPhotoResource\RelationManagers;
use App\Models\DeptGroupPhoto;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeptGroupPhotoResource extends Resource
{
    protected static ?string $model = DeptGroupPhoto::class;
    protected static ?string $modelLabel = 'Group Photos';


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeptGroupPhotos::route('/'),
            'create' => Pages\CreateDeptGroupPhoto::route('/create'),
            'edit' => Pages\EditDeptGroupPhoto::route('/{record}/edit'),
        ];
    }    
}
