<td colspan="5" class="px-4 py-3 filament-tables-text-column" alignment="right">
    Total:
</td>
<td class="filament-tables-cell" alignment="right">
    <div class="px-4 py-3 filament-tables-text-column">
       Valor das Parcelas: R$ {{($this->getTableRecords()->sum('valor_parcela')) }} <br>
       Valor Recebido: R$ {{($this->getTableRecords()->sum('valor_recebido')) }}
    </div>

</td>

