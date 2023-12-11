<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\News;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\NewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsResource\RelationManagers;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static bool $shouldRegisterNavigation = false;

    // protected static ?string $pluralModelLabel = 'Tin tức';
    // protected static ?string $navigationGroup = 'TIN TỨC';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                // ->required()
                ->columnSpan('full')
                ->maxLength(255)->label(__('Tiêu đề tin tức (*)'))
                ->rule('required'),
                // ->rules([
                //     function () {
                //         return function (string $attribute, $value, Closure $fail) {

                //             if ($value == null) {
                //                 $fail('The :attribute is invalid11.');
                //             }
                //             dd($attribute, $value, $fail);
                //         };
                //     },
                // ]),
            Textarea::make('description')
                ->maxLength(65535)
                ->autosize()
                ->rule('required')
                    ->label(__('Mô tả tin tức (*)')),
            Forms\Components\FileUpload::make('description_images')
                ->directory('media/news_images')
                ->downloadable()->openable()->rule('required')
                ->image()->label(__('Hình ảnh mô tả tin tức (*)')),
            TiptapEditor::make('content')
                ->disableFloatingMenus()
                ->tools([
                    'heading', 'bullet-list', 'ordered-list', 'checked-list', 'blockquote', 'bold',
                    'italic', 'strike', 'underline', 'color', 'highlight', 'align-left', 'align-center',
                    'align-right', 'table', 'grid', 'grid-builder', 'media'
                ]) // individual tools to use in the editor, overwrites profile
                ->directory('media/news_images') // optional, defaults to config setting
                ->output(TiptapOutput::Html) // optional, change the output format. defaults is html
                ->rule('required')
                ->columnSpan('full')
                ->label(__('Mô tả đầy đủ (*)')),
                Checkbox::make('display')->label(__('Hiển thị tin tức')),
            ]);
    }

    // public function filament_tiptap_media(): array
    // {
    //     return [
    //         FileUpload::make('src')
    //             ->required()
    //             ->live(),
    //             Hidden::make('link_text')
    //             ->label(__('filament-tiptap-editor::media-modal.labels.link_text'))
    //             ->required()
    //             ->visible(fn (callable $get) => $get('type') == 'document'),
    //             Hidden::make('alt')
    //             ->label(__('filament-tiptap-editor::media-modal.labels.alt'))
    //             ->hidden(fn (callable $get) => $get('type') == 'document')
    //             ->hintAction(
    //                 Action::make('alt_hint_action')
    //                     ->label('?')
    //                     ->color('primary')
    //                     ->url('https://www.w3.org/WAI/tutorials/images/decision-tree', true)
    //             ),
    //             Hidden::make('title')
    //             ->label(__('filament-tiptap-editor::media-modal.labels.title')),
    //         Hidden::make('width'),
    //         Hidden::make('height'),
    //         Hidden::make('type')
    //             ->default('document'),
    //     ];
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable()->sortable()->label(__('Tiêu đề')),
                ImageColumn::make('description_images')->label(__('Hình ảnh')),
                ToggleColumn::make('display')->disabled()->label(__('Hiển thị'))
                ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('description_images')->label(__('Hình ảnh')),
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
                Tables\Filters\SelectFilter::make('display')
                ->options([
                    true => 'show',
                    false => 'hidden',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('chỉnh sửa')->hidden(fn(): bool => ! auth()->user()->can('update News')),
                Tables\Actions\ViewAction::make()->label('xem'),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->hidden(fn(): bool => ! auth()->user()->can('create News')),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
            'view' => Pages\ViewNews::route('/{record}'),
        ];
    }
}
