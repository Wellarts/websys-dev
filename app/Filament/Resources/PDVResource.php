<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PDVResource\Pages;
use App\Filament\Resources\PDVResource\RelationManagers;
use App\Models\PDV;
use App\Models\Produto;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class PDVResource extends Resource
{
    protected static ?string $model = PDV::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $title = 'Editar item da venda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Select::make('produto_id')
                            ->options(Produto::pluck('nome', 'id'))
                            ->disabled()                           
                            ->label('Produto'),
                        Forms\Components\TextInput::make('qtd')
                            ->label('Quantidade'),
                        Forms\Components\TextInput::make('acres_desc')
                            ->label('Acréscimo/Desconto'),    
                        Forms\Components\TextInput::make('valor_venda')
                            ->label('Valor Venda'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('valor_venda'),
                Tables\Columns\TextColumn::make('qtd'),
                
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                    
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPDVS::route('/'),
            'create' => Pages\CreatePDV::route('/create'),
            'edit' => Pages\EditPDV::route('/{record}/edit'),
        ];
    }    
}
