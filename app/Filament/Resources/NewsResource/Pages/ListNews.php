<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNews extends ListRecords
{
    protected static string $resource = NewsResource::class;
    protected static ?string $title = "Danh sách tin tức";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('thêm mới')->hidden(fn(): bool => ! auth()->user()->can('create News')),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
