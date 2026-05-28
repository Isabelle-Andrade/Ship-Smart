<?php

namespace App\Filament\Resources\EncomendasResource\Pages;

use App\Filament\Resources\EncomendasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEncomendas extends CreateRecord
{
    protected static string $resource = EncomendasResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Produto cadastrado com sucesso!';
    }
}
