<?php

namespace App\Filament\Resources\RastreamentoResource\Pages;

use App\Filament\Resources\RastreamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRastreamento extends EditRecord
{
    protected static string $resource = RastreamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
