<?php

namespace App\Filament\Resources\ProdukHukumResource\Pages;

use App\Filament\Resources\ProdukHukumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukHukums extends ListRecords
{
    protected static string $resource = ProdukHukumResource::class;

    protected static ?string $title = 'Produk Hukum';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
