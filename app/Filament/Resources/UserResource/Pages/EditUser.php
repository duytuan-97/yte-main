<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected static bool $canCreateAnother = false;
    protected static ?string $title = "Chỉnh sửa người dùng";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('xóa')->hidden(fn(): bool => ! auth()->user()->can('delete User')),
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('update User'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
