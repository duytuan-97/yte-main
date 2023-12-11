<?php

namespace App\Filament\Resources\NewsResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\NewsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
    protected static ?string $title = "Tạo mới tin tức";
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('create News'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }
}
