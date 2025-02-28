<?php

namespace App\Filament\Resources\DeputyResource\Pages;

use App\Filament\Resources\DeputyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDeputy extends EditRecord
{
    protected static string $resource = DeputyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
