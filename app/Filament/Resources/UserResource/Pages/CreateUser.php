<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static bool $canCreateAnother = false;
    protected static ?string $title = "Thêm mới người dùng";
    protected static ?string $breadcrumb = "Thêm mới";
    protected static ?string $label = "Thêm mới";

    public function getBreadcrumbs(): array
    {
        return [];
    }

    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label(__('tạo mới'))
            ->submit('create')
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('create User'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
