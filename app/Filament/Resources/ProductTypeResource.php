<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductType;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductTypeResource\Pages;
use App\Filament\Resources\ProductTypeResource\RelationManagers;

class ProductTypeResource extends Resource
{
    protected static ?string $model = ProductType::class;

    protected static bool $shouldRegisterNavigation = false;


    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    // protected static ?string $modelLabel = 'Loại sản phẩm';

    // protected static ?string $pluralModelLabel = 'LOẠI SẢN PHẨM';
    // protected static ?string $navigationGroup = 'SẢN PHẨM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->rule('required')
                    ->columnSpan('full')
                    ->maxLength(255)->label(__('Tên loại sản phẩm (*)')),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable()->sortable()->label(__('Tên loại sản phẩm')),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Thời gian thêm')
                ->sortable()->dateTime('d/m/Y, h:i:s A'),
                Tables\Columns\TextColumn::make('updated_at')
                ->dateTime('d/m/Y, h:i:s A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Thời gian sửa'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('d/m/Y, h:i:s A')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()->label('Thời gian xóa'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('xem'),
                Tables\Actions\EditAction::make()->label('chỉnh sửa')->hidden(fn(): bool => ! auth()->user()->can('update Product Type')),
                Tables\Actions\DeleteAction::make()->label('Xóa')->hidden(fn(): bool => ! auth()->user()->can('delete Product Type')),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->hidden(fn(): bool => ! auth()->user()->can('create Product Type')),
            ]);
    }

    // public static function getNavigationIcon(): ?string
    // {
    //     return 'heroicon-o-queue-list';
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        $heading = 'danh sách';
        return [
            'index' => Pages\ListPoductTypes::route('/'),
            'create' => Pages\CreatePoductType::route('/create'),
            'edit' => Pages\EditPoductType::route('/{record}/edit'),
            'view' => Pages\ViewProductType::route('/{record}'),
        ];
    }
}
