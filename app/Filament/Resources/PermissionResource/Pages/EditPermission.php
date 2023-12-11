<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PermissionResource;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;
    protected static ?string $title = "Chỉnh sửa quyền";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('xóa')->hidden(fn(): bool => ! auth()->user()->can('delete Product')),
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('update Product'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
