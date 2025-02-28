<?php

namespace App\Filament\Resources\DeputyResource\Pages;

use App\Filament\Resources\DeputyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDeputies extends ListRecords
{
    protected static string $resource = DeputyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
