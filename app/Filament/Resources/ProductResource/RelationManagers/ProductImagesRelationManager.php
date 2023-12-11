<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProductImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'product_images';



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('type')
                // ->options([
                //     'product' => 'product',
                //     'description' => 'description',
                // ]),
                Forms\Components\FileUpload::make('image_path'),
                // ->mutateRelationshipDataBeforeCreateUsing(function (array $data, Model $record){//: array

                //     // $data['user_id'] = auth()->id();
                //     // $product = $form->reset();
                //     // $data['product_id'] = $product->id;


                //     $product = Product::find($record->id);
                //     dd($data, $data['image_path'], $product, $record->id);
                //     foreach($data['image_path'] as $item){
                //         $product->product_images()->create([
                //             // 'image_path' => $image_paths_string,
                //             'image_path' => $item,
                //         ]);
                //     }

                //     $data = null;
                //     return null;
                // }),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('image_path')
            ->columns([
                Tables\Columns\TextColumn::make('image_path'),
                // Tables\Columns\TextColumn::make('type')
                // ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
