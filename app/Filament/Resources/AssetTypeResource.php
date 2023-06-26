<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetTypeResource\Pages;
use App\Filament\Resources\AssetTypeResource\RelationManagers;
use App\Models\AssetType;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetTypeResource extends Resource
{
    protected static ?string $model = AssetType::class;

    protected static ?string $navigationGroup = "Data Master";

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?int $navigationSort = 103;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    /**
     * Mendapatkan daftar kelas pengelola relasi yang terkait dengan objek saat ini.
     *
     * @return array<class-string> Array yang berisi daftar kelas Relation Manager yang terkait.
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Mengembalikan array yang berisi daftar halaman (pages) yang terkait.
     *
     * @return array<string, array<mixed>> The array of pages.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetTypes::route('/'),
            'create' => Pages\CreateAssetType::route('/create'),
            'view' => Pages\ViewAssetType::route('/{record}'),
            'edit' => Pages\EditAssetType::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
