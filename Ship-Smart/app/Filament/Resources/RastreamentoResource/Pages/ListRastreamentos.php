<?php

namespace App\Filament\Resources\RastreamentoResource\Pages;

use App\Filament\Resources\RastreamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRastreamentos extends ListRecords
{
    protected static string $resource = RastreamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
