<?php

namespace App\Filament\Resources\EncomendasResource\Pages;

use App\Filament\Resources\EncomendasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEncomendas extends ListRecords
{
    protected static string $resource = EncomendasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Novo Pedido')  
                ->icon('heroicon-o-plus'),
        ];
    }
}
