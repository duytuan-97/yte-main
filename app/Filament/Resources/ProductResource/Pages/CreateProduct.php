<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Illuminate\Http\Client\Request;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\ListProducts;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected static bool $canCreateAnother = false;
    protected static ?string $title = "Thêm mới sản phẩm";
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
            ->keyBindings(['mod+s'])->hidden(fn(): bool => ! auth()->user()->can('create Product'));
    }

    protected function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('thoát'))
            ->url($this->previousUrl ?? static::getResource()::getUrl())
            ->color('gray');
    }


    // protected function afterCreate(): void
    // {
    //     dd($this->record);
    // }

    // protected function beforeCreate(): string
    // {
    //     $images = json_encode($this->form->getState()['images']);

    //     // dd($this->form->getState(), $images, json_encode($this->form->getState()['display']));

    //         $product = Product::create([
    //         // 'id' => Str::uuid()->toString(),
    //         'product_type_id' => $this->form->getState()['product_type_id'],
    //         'first_name' => $this->form->getState()['first_name'],
    //         'last_name' => $this->form->getState()['last_name'],
    //         'description' => $this->form->getState()['description'],
    //         'content' => $this->form->getState()['content'],
    //         'price' => $this->form->getState()['price'],
    //         'purpose' => $this->form->getState()['purpose'],
    //         'drug_facts' => $this->form->getState()['drug_facts'],
    //         'use' => $this->form->getState()['use'],
    //         'images' => $this->form->getState()['images'],
    //         'display' => $this->form->getState()['display'],
    //     ]);

    //     $this->halt();
    //     return $this->getResource()::getUrl('index');
    // }

    // protected function beforeCreate(): string //void
    // {
    //     // Runs before the form fields are saved to the database.

    //     // $product = Product::create([
    //     //     'product_type_id' => $this->form->getState()['product_type_id'],
    //     //     'first_name' => $this->form->getState()['first_name'],
    //     //     'last_name' => $this->form->getState()['last_name'],
    //     //     'description' => $this->form->getState()['description'],
    //     //     'content' => $this->form->getState()['content'],
    //     //     'price' => $this->form->getState()['price'],
    //     //     'purpose' => $this->form->getState()['purpose'],
    //     //     'usage' => $this->form->getState()['usage'],
    //     //     'object_uses' => $this->form->getState()['object_uses'],
    //     // ]);
    //     // foreach($this->form->getState()['image_path'] as $item){
    //     //     // dd($item, $this->form->getState()['image_path'], $product);
    //     //     // $product->product_images()->create([
    //     //     //     'image_path' => $item,
    //     //     // ]);
    //     //     // ProductImage::create([
    //     //     //     'image_path' => $item,
    //     //     //     'product_id' => $product->id,
    //     //     // ]);
    //     //     $product->product_images()->create([
    //     //         // 'image_path' => $image_paths_string,
    //     //         'image_path' => $item,
    //     //     ]);
    //     // }
    //     $this->halt();
    //     return $this->getResource()::getUrl('index');



    //     // return ListProducts::route('/');


    //     // dd($this->form->getState()['last_name']);
    // }

    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('index');
    // }



}
