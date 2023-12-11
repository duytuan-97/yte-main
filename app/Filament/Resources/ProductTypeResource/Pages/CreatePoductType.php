<?php

namespace App\Filament\Resources\ProductTypeResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductTypeResource;

class CreatePoductType extends CreateRecord
{
    protected static string $resource = ProductTypeResource::class;
    protected static ?string $title = "Tạo Mới Lọai Sản Phẩm";
    protected static bool $canCreateAnother = false;

    public function getBreadcrumbs(): array
    {
        return [];
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label(__('tạo mới'))
            ->submit('create')
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('create Product Type'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
