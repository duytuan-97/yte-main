<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource\Pages\CreatePermission as SpatieCreatePermission;

class CreatePermission extends SpatieCreatePermission
{
    protected static string $resource = PermissionResource::class;
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('create Product'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
