<?php

namespace App\Filament\Resources\ProductTypeResource\Pages;

use App\Filament\Resources\ProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPoductTypes extends ListRecords
{
    protected static string $resource = ProductTypeResource::class;
    protected static ?string $title = "Danh sách loại sản phẩm";


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('thêm mới')->hidden(fn(): bool => ! auth()->user()->can('create Product Type')),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
