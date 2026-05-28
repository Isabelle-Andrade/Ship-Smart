<?php

namespace App\Filament\Resources\EncomendasResource\Pages;

use App\Filament\Resources\EncomendasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEncomendas extends EditRecord
{
    protected static string $resource = EncomendasResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Produto atualizado com sucesso!';
    }
}
