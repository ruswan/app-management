<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'projects';

    protected static ?string $recordTitleAttribute = 'name';

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('user.name')
                ->label('PIC'),
            Tables\Columns\TextColumn::make('productionYear.year')
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
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                ->url(fn (Project $record): string => route('filament.resources.projects.view', $record))
                ->icon('heroicon-s-eye')
                ->color('secondary'),
            ]);
    }
}
