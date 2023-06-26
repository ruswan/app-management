<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetResource\Pages;
use App\Filament\Resources\AssetResource\RelationManagers;
use App\Models\Asset;
use App\Models\AssetCategory;
use App\Models\AssetCondition;
use App\Models\AssetType;
use App\Models\Brand;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationGroup = "Asset";

    protected static ?string $navigationIcon = 'heroicon-o-folder';

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
                            ->required()
                            ->maxLength(65535),
                    ])->columns(1)
                    ->columnSpan(3),

                Card::make()
                    ->schema([
                        Forms\Components\Select::make('asset_categori_id')
                            ->label(__('Asset Category'))
                            ->options(AssetCategory::all()
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('brand_id')
                            ->label(__('Brand'))
                            ->options(Brand::all()
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('asset_type_id')
                            ->label(__('Type'))
                            ->options(AssetType::all()
                                ->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\Select::make('condition_id')
                            ->label(__('Condition'))
                            ->options(AssetCondition::all()
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('sn_number')
                            ->label(__('SN Number'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mac_address')
                            ->label(__('MAC Address'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ip_address')
                            ->label(__('IP Address'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('code')
                            ->label(__('Asset Code'))
                            ->maxLength(255),
                    ])->columns(2)
                    ->columnSpan(2),

                Card::make()
                    ->schema([
                        Forms\Components\Select::make('department_id')
                            ->label(__('Department'))
                            ->options(Department::all()
                                ->pluck('name', 'id'))
                            ->searchable(),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('purchase_year')
                            ->label(__('Purchase Year')),
                        Forms\Components\FileUpload::make('attachment'),
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
                Tables\Columns\TextColumn::make('assetCategory.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('purchase_year')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assetCondition.name')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('asset_category_id')
                    ->label(__('Asset Category'))
                    ->relationship('assetCategory', 'name')
                    ->searchable()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('brand_id')
                    ->label(__('Brand'))
                    ->relationship('brand', 'name')
                    ->searchable()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('condition_id')
                    ->label(__('Condition'))
                    ->relationship('assetCondition', 'name')
                    ->searchable()
                    ->multiple(),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'view' => Pages\ViewAsset::route('/{record}'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
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
