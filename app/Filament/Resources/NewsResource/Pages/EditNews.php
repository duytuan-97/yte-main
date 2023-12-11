<?php

namespace App\Filament\Resources\NewsResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\NewsResource;
use Filament\Resources\Pages\EditRecord;

class EditNews extends EditRecord
{
    protected static string $resource = NewsResource::class;
    protected static ?string $title = "Chỉnh sửa tin tức";
    protected static bool $canCreateAnother = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->label('xóa')->hidden(fn(): bool => ! auth()->user()->can('delete News')),
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('update News'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }

}
