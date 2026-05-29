<?php

namespace App\Filament\Resources\RastreamentoResource\Pages;

use App\Filament\Resources\RastreamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRastreamento extends EditRecord
{
    protected static string $resource = RastreamentoResource::class;

    protected array $dadosAntigos = [];

    protected function beforeFill(): void
    {
        $movimento = $this->getRecord();
        $this->dadosAntigos = [
            'tipo'       => $rastreamento->tipo,
            'quantidade' => $rastreamento->quantidade,
            'produto_id' => $rastreamento->produto_id,
        ];
    }

    protected function beforeSave(): void
    {
        $data = $this->data;
        $encomendas = Encomendas::find($data['produto_id']);
        $novaQtd = (int) $data['quantidade'];
        $novoTipo = $data['tipo'];

        if (!$encomendas) {
            Notification::make()
                ->title('Produto não encontrado')
                ->body('Selecione um produto válido.')
                ->danger()
                ->send();

            $this->halt();
        }


        // Verifica se tem estoque para o novo movimento
        if ($novoTipo === 'saida' && $novaQtd > $encomendas->quantidade) {
            // Reverte a reversão para não deixar o estoque inconsistente
            if ($this->dadosAntigos['tipo'] === 'entrada') {
                $encomendas->increment('quantidade', $this->dadosAntigos['quantidade']);
            } else {
                $encomendas->decrement('quantidade', $this->dadosAntigos['quantidade']);
            }

            Notification::make()
                ->title('Estoque insuficiente')
                ->body("Estoque de '{$encomendas->nome}' é de apenas {$encomendas->quantidade} unidades.")
                ->danger()
                ->send();

            $this->halt();
        }

        // Aplica o novo movimento
        if ($novoTipo === 'entrada') {
            $encomendas->increment('quantidade', $novaQtd);
        } else {
            $encomendas->decrement('quantidade', $novaQtd);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
