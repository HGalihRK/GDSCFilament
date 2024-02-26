<?php

namespace App\Filament\Resources\HotelRoomReservationResource\Pages;

use App\Filament\Resources\HotelRoomReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHotelRoomReservation extends EditRecord
{
    protected static string $resource = HotelRoomReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
