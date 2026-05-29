<?php

namespace App\Filament\Resources\RastreamentoResource\Pages;

use App\Filament\Resources\RastreamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRastreamento extends CreateRecord
{
    protected static string $resource = RastreamentoResource::class;

    protected function beforeCreate(): void
    {
        $data = $this->data;
        $encomendas = Encomendas::find($data['produto_id']); 
        $quantidade = $data['quantidade'] ?? 0;
        $tipo = $data['tipo'] ?? 0;

        if (!$encomendas) {
            Notification::make()
                ->title('Produto não encontrado')
                ->body('Selecione um produto válido.')
                ->danger()
                ->send();

            $this->halt();
        }

        if ($tipo === 'saida' && $quantidade > $medicamento->quantidade) { 
            Notification::make()
                ->title('Estoque insuficiente')
                ->body("Estoque de '{$encomendas->nome}' é de apenas {$encomenda->quantidade} unidades.")
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function afterCreate(): void
    {
        $rastreamento = $this->getRecord();
        $encomenda = $rastreamento->encomendas; 

        if ($rastreamento->tipo === 'entrada') {
            $encomendas->increment('quantidade'); 
        } else {
            $encomendas->decrement('quantidade'); 
        }
    }
}
