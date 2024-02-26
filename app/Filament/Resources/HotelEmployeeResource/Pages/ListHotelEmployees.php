<?php

namespace App\Filament\Resources\HotelEmployeeResource\Pages;

use App\Filament\Resources\HotelEmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHotelEmployees extends ListRecords
{
    protected static string $resource = HotelEmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
