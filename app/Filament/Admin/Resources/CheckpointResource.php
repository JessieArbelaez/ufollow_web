<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CheckpointResource\Pages;
use App\Filament\Admin\Resources\CheckpointResource\RelationManagers;
use App\Models\Checkpoint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Set;

class CheckpointResource extends Resource
{
    protected static ?string $model = Checkpoint::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Routes'; 

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('route_id')
                    ->relationship('route', 'id')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('latitude'),
                Forms\Components\Hidden::make('longitude'),
                Map::make('location')
                    ->label('Location')
                    ->columnSpanFull()
                    ->defaultLocation(latitude: 5.06889, longitude: -75.51738)
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, ?array $state): void {
                        $set('latitude',  $state['lat']);
                        $set('longitude', $state['lng']);
                    })
                    ->afterStateHydrated(function ($state, $record, Set $set): void {
                        $set('location', [
                            'lat' => $record?->latitude,
                            'lng' => $record?->longitude,
                        ]);
                    })
                    ->extraStyles([
                        'min-height: 400px',
                        'border-radius: 10px'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('route.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
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
            'index' => Pages\ManageCheckpoints::route('/'),
        ];
    }
}
