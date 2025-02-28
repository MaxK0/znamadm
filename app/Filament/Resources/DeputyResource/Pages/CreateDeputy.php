<?php

namespace App\Filament\Resources\DeputyResource\Pages;

use App\Filament\Resources\DeputyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDeputy extends CreateRecord
{
    protected static string $resource = DeputyResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
