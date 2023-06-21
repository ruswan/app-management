<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Filament\Resources\ProjectResource\RelationManagers\DepartmentsRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\ModulesRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\ProjectUsersRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\UsersRelationManager;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

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
                    ])->columns(1)
                    ->columnSpan(2),

                Card::make()
                    ->schema([
                        Forms\Components\Select::make('responsible_id')
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->label('PIC')
                            ->required(),
                        Forms\Components\TextInput::make('production_year')
                            ->required(),
                    ])->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('PIC'),
                Tables\Columns\TextColumn::make('production_year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('departments_count')
                    ->counts('departments')
                    ->sortable(),
                Tables\Columns\TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Teams count')
                    ->sortable(),
                Tables\Columns\TextColumn::make('modules_count')
                    ->counts('modules')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('responsible_id')
                    ->relationship('user', 'name')
                    ->label('PIC'),
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
            DepartmentsRelationManager::class,
            ModulesRelationManager::class,
            UsersRelationManager::class,
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
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
