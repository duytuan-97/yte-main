<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = "Danh sách người dùng";

    public function table(Table $table): Table
    {
        return parent::table($table)->modifyQueryUsing(function (Builder $query) {
            return $query->whereNotIn('id', [auth()->id()]);
        });
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('thêm mới')->hidden(fn (): bool => !auth()->user()->can('create User')),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [];
    }
}
