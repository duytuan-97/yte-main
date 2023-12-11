<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;
    protected static ?string $title = "Danh sách sản phẩm";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('thêm mới')->hidden(fn(): bool => ! auth()->user()->can('create Product')),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
