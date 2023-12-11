<?php

namespace App\Filament\Resources\ProductTypeResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductTypeResource;

class EditPoductType extends EditRecord
{
    protected static string $resource = ProductTypeResource::class;
    protected static ?string $title = "Chỉnh Sửa Loại Sản Phẩm";
    protected static bool $canCreateAnother = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('xóa')->hidden(fn(): bool => ! auth()->user()->can('delete Product Type')),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('chỉnh sửa'))
            ->submit('save')
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('update Product Type'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }

}
