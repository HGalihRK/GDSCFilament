<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelRoomReservationResource\Pages;
use App\Filament\Resources\HotelRoomReservationResource\RelationManagers;
use App\Models\HotelRoomReservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HotelRoomReservationResource extends Resource
{
    protected static ?string $model = HotelRoomReservation::class;
    protected static ?string $navigationIcon = 'bx-hotel';
    protected static ?string $navigationGroup = 'Service';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hotel_room_id')
                    ->relationship('hotel_room','name')
                    ->required()
                    ,
                Forms\Components\Select::make('guest_id')
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->label("Nomor Induk Kependudukan")
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dob')
                    ->label("Date of Birth")
                    ->required(),
                    ])
                    
                    ->relationship('guest','name'),
                Forms\Components\Select::make('hotel_employee_id')
                    ->relationship('hotel_employee','name')
                    ->required()
                    ,
                Forms\Components\DateTimePicker::make('check_in')
                    ->required(),
                Forms\Components\DateTimePicker::make('check_out')
                    ->required(),
                Forms\Components\Textarea::make('note')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hotel_room.hotel.name')
                    
                ->sortable(),
                Tables\Columns\TextColumn::make('hotel_room.name')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('guest.name')
                    ->label("Reserved By")
                    ->sortable(),
                Tables\Columns\TextColumn::make('hotel_employee.name')
                    ->label("Managed By")
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_in')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('check_out')
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListHotelRoomReservations::route('/'),
            'create' => Pages\CreateHotelRoomReservation::route('/create'),
            'edit' => Pages\EditHotelRoomReservation::route('/{record}/edit'),
        ];
    }
}
