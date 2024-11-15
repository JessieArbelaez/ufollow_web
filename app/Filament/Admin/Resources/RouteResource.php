<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RouteResource\Pages;
use App\Filament\Admin\Resources\RouteResource\RelationManagers;
use App\Models\Route;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RouteResource extends Resource
{
    protected static ?string $model = Route::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Routes';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('start_city_id')
                    ->relationship('startCity', 'name')
                    ->required(),
                // TODO: Excluír ciudad inicial
                Forms\Components\Select::make('finish_city_id')
                    ->relationship('finishCity', 'name')
                    ->required(),
                Forms\Components\Select::make('driver_id')
                    ->relationship('driver', 'driving_license_number')
                    ->required(),
                Forms\Components\Select::make('vehicle_id')
                    ->relationship('vehicle', 'plate')
                    ->required(),
                Forms\Components\DateTimePicker::make('scheduled_start_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('scheduled_finish_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('start_date'),
                Forms\Components\DateTimePicker::make('finish_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('startCity.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('finishCity.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('driver.driving_license_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vehicle.plate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scheduled_start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scheduled_finish_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('finish_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRoutes::route('/'),
        ];
    }
}
