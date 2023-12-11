<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\ViewUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // protected static ?string $navigationGroup = 'QUYỀN';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Select::make('roles')->multiple()->relationship('roles', 'name'),
                Select::make('permissions')->multiple()->relationship('permissions', 'name')->label('Quyền')->columnSpan('full'),
                Forms\Components\TextInput::make('name')
                ->rule('required')
                    ->maxLength(255)->label('Tên (*)'),
                Forms\Components\TextInput::make('email')
                    // ->email()
                    ->rules(['email', 'required'])
                    ->maxLength(255)->label('Email (*)'),
                Forms\Components\DateTimePicker::make('email_verified_at')->native(false)->displayFormat('d/m/Y, h:i:s A')->label('Xác minh email'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->rule('required')
                    ->maxLength(255)->label('Mật khẩu (*)'),
                    Checkbox::make('is_admin')->label('Admin'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->label('Tên'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()->label('Email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime('d/m/Y, h:i:s A')
                    ->sortable()->label('Xác minh email'),
                    // Checkbox::make('is_admin')
                    // ->numeric()
                    // ->sortable()->label('Admin'),
                    ToggleColumn::make('is_admin')->disabled()->label(__('Admin'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime('d/m/Y, h:i:s A')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()->label('Thời gian xóa'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d/m/Y, h:i:s A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Thời gian tạo'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y, h:i:s A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Thời gian sửa'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Xem'),
                Tables\Actions\EditAction::make()->label('Chỉnh sửa')->hidden(fn(): bool => ! auth()->user()->can('update User')),
                Tables\Actions\DeleteAction::make()->label('Xóa')->hidden(fn(): bool => ! auth()->user()->can('delete User')),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                // Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->hidden(fn(): bool => ! auth()->user()->can('create User')),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => ViewUser::route('/{record}'),
        ];
    }
}
