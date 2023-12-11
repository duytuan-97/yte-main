<?php

namespace App\Filament\Resources\ProductTypeResource\Pages;

use App\Filament\Resources\ProductTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductType extends ViewRecord
{
    protected static string $resource = ProductTypeResource::class;
    protected static ?string $title = "Loại sản phẩm";

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
