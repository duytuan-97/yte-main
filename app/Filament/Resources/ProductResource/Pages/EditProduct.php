<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Illuminate\Http\Client\Request;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;
    protected static bool $canCreateAnother = false;
    protected static ?string $title = "Chỉnh sửa sản phẩm";

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

    // public function __construct(){
    //     dd('hello', $this->record);
    // }

    // protected function mutateFormDataBeforeFill(array $data): array
    // {
    //     // Runs before the form fields are populated from the database.
    //     dd('hello', $this->record->product_images, $data);
    //     // return
    // }
}
