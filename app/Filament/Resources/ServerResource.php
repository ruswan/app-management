<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServerResource\Pages;
use App\Filament\Resources\ServerResource\RelationManagers;
use App\Filament\Resources\ServerResource\RelationManagers\ProjectsRelationManager;
use App\Models\Server;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static ?string $navigationGroup = "Data Master";

    protected static ?string $navigationIcon = 'heroicon-o-server';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->maxLength(65535),
                        Forms\Components\TextInput::make('ip_address')
                            ->maxLength(19),
                        Forms\Components\Toggle::make('is_internal')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_internal')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('projects_count')
                    ->counts('projects')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('is_internal')
                    ->options([
                        true => 'Yes',
                        false => 'No',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ])
            ->defaultSort('id', 'desc');
    }

    /**
     * Mendapatkan daftar kelas pengelola relasi yang terkait dengan objek saat ini.
     *
     * @return array<class-string> Array yang berisi daftar kelas Relation Manager yang terkait.
     */
    public static function getRelations(): array
    {
        return [
            ProjectsRelationManager::class,
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
            'index' => Pages\ListServers::route('/'),
            'create' => Pages\CreateServer::route('/create'),
            'view' => Pages\ViewServer::route('/{record}'),
            'edit' => Pages\EditServer::route('/{record}/edit'),
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
