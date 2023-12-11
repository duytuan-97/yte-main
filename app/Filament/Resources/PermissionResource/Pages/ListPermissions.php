<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Filament\Actions;
use Spatie\Permission\Models\Permission;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PermissionResource;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;
    protected static ?string $title = "Danh sách quyền";

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
