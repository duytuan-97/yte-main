<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductType;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProductResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;


    // protected static ?string $modelLabel = 'sản phẩm';

    // protected static ?string $pluralModelLabel = 'Sản phẩm';
    // protected static ?string $navigationGroup = 'SẢN PHẨM';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                ->rule('required')->label(__('Tiêu đề (*)')),
                TextInput::make('last_name')
                ->rule('required')->label(__('Tên sản phẩm (*)')),
                Textarea::make('description')
                    // ->maxLength(65535)
                    ->rule('max_digits:65535')
                    ->label(__('Mô tả ngắn')),
                Textarea::make('drug_facts')
                    ->label(__('Đối tượng sử dụng')),
                RichEditor::make('purpose')
                    ->toolbarButtons([
                        'bulletList',
                    ])
                    ->label(__('Công dụng')),
                RichEditor::make('use')
                    ->toolbarButtons([
                        // 'h3',
                        'bold'
                    ])
                    ->label(__('Cách dùng')),
                TextInput::make('price')
                    // ->numeric()
                    // ->mask('$###,###.##')
                    // ->step(10000)
                    // ->minValue(0)
                    ->prefix('VND')
                    ->rules(['required', 'numeric', 'min:0'])->label(__('Giá (*)')),
                // ->maxValue(4442949672.95),
                Select::make('product_type_id')
                    ->relationship('product_type', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([ //button add product type
                        // Forms\Components\TextInput::make('first_name')
                        // ->required()
                        //     ->maxLength(255),
                        Forms\Components\TextInput::make('name')
                            // ->label('Email address')
                            // ->email()
                            ->label(__('Tên loại sản phẩm (*)'))
                            ->rule('required')
                            ->maxLength(255),
                    ])
                    ->rule('required')->label(__('Loại sản phẩm (*)')),
                // RichEditor::make('content')
                // ->toolbarButtons([
                //     'attachFiles',
                //     'blockquote',
                //     'bold',
                //     'bulletList',
                //     'codeBlock',
                //     'h2',
                //     'h3',
                //     'italic',
                //     'link',
                //     'orderedList',
                //     'strike',
                // ])
                //     ->columnSpan('full')->required()
                //     ->fileAttachmentsDirectory('media/product_images')
                //     ->label(__('Mô tả đầy đủ')),

                TiptapEditor::make('content')
                    // ->profile('default|simple|minimal|none|custom')
                    ->disableFloatingMenus()
                    ->tools([
                        'heading', 'bullet-list', 'ordered-list', 'checked-list', 'blockquote', 'bold',
                        'italic', 'strike', 'underline', 'color', 'highlight', 'align-left', 'align-center',
                        'align-right', 'table', 'grid', 'grid-builder', 'media'
                    ]) // individual tools to use in the editor, overwrites profile
                    // ->disk('string') // optional, defaults to config setting
                    ->directory('media/product_images') // optional, defaults to config setting
                    // ->acceptedFileTypes(['array of file types']) // optional, defaults to config setting
                    // ->maxFileSize('integer in KB') // optional, defaults to config setting
                    ->output(TiptapOutput::Html) // optional, change the output format. defaults is html
                    // ->maxContentWidth('5xl')
                    // ->required()
                    ->columnSpan('full')
                    ->label(__('Mô tả đầy đủ')),

                Forms\Components\FileUpload::make('images')
                    ->directory('media/product_images')
                    ->reorderable()->appendFiles()->downloadable()->openable()
                    ->image()->multiple()->minFiles(1)->panelLayout('grid')->columnSpan('full')->label(__('Hình ảnh sản phẩm')),
                Checkbox::make('display')->label(__('Hiển thị sản phẩm lên trang')),

                // ]),
                // Wizard\Step::make('Images')
                // ->schema([
                // Repeater::make('product_images')
                // ->relationship()
                //     ->schema([
                //         Forms\Components\FileUpload::make('image_path')->multiple(), //
                //     ])
                //     ->addable(false)
                //     ->deletable(false)
                //     ->columnSpan('full')
                //     ->label(__('Hình ảnh'))
                //     ->mutateRelationshipDataBeforeFillUsing(function (array $data, Model $record): array {
                //         // $data['user_id'] = auth()->id();
                //         // dd($data, $record->id);
                //         // if($record->id != null){
                //         //     return null;
                //         // }
                //         return $data;
                //     })
                //     ->mutateRelationshipDataBeforeCreateUsing(function (array $data, Model $record) { //: array

                //         $product = Product::find($record->id);
                //         // dd($data['image_path'], $product, $record->id);
                //         foreach ($data['image_path'] as $item) {
                //             $product->product_images()->create([
                //                 'image_path' => $item,
                //             ]);
                //         }
                //         $data = null;
                //         return null;
                //     })->hiddenOn('edit'),

                // ]),
                // Wizard\Step::make('Billing')
                //     ->schema([
                //         // ...
                //     ]),

                // ])->columnSpan('full'),

                // CuratorPicker::make('product_images_ids')
                // ->label('images')
                // ->buttonLabel('add image')
                // ->color('primary|secondary|success|danger') // defaults to primary
                // ->outlined(true) // defaults to true
                // // ->size('sm|md|lg') // defaults to md
                // ->constrained(true) // defaults to false (forces image to fit inside the preview area)
                // ->pathGenerator(DatePathGenerator::class|UserPathGenerator::class) // see path generators below
                // ->lazyLoad(true) // defaults to true
                // // see https://filamentphp.com/docs/2.x/forms/fields#file-upload for more information about the following methods
                // ->preserveFilenames()
                // // ->maxWidth(800)
                // // ->minSize(100)
                // // ->maxSize()
                // // ->rules()
                // // ->acceptedFileTypes()
                // // ->disk()
                // // ->visibility()
                // // ->directory()
                // // ->imageCropAspectRatio()
                // // ->imageResizeTargetWidth()
                // // ->imageResizeTargetHeight()
                // ->multiple() // required if using a relationship with multiple media
                // ->relationship('product_images', 'id')
                // ->orderColumn('order'), // only necessary to rename the order column if using a relationship with multiple media

                // Forms\Components\FileUpload::make('image_path')->multiple(),//

                // Repeater::make('product_images')
                // ->relationship()
                // ->schema([
                //     // Forms\Components\Select::make('type')
                //     // ->options([
                //     //     'product' => 'product',
                //     //     'description' => 'description',
                //     // ]),
                //     Forms\Components\FileUpload::make('image_path')->multiple(),//
                // ])
                // ->addable(false)
                // ->deletable(false)
                // ->columnSpan('full')
                // ->label(__('Hình ảnh'))
                // ->mutateRelationshipDataBeforeCreateUsing(function (array $data, Model $record){//: array

                //     // $data['user_id'] = auth()->id();
                //     // $product = $form->reset();
                //     // $data['product_id'] = $product->id;


                //     $product = Product::find($record->id);
                //     // dd($data['image_path'], $product, $record->id);
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                // Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name')->label(__('Tên sản phẩm'))
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price')->label(__('Giá'))
                    ->numeric(
                        decimalPlaces: 0,
                        decimalSeparator: '.',
                        thousandsSeparator: ',',
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_type.name')
                ->label(__('Tên loại sản phẩm'))
                    ->searchable(),
                ToggleColumn::make('display')->disabled()->label(__('Hiển thị'))
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
                Tables\Filters\SelectFilter::make('display')
                    ->options([
                        true => 'show',
                        false => 'hidden',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Chỉnh sửa')->hidden(fn (): bool => !auth()->user()->can('update Product')),
                Tables\Actions\ViewAction::make()->label('xem'),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->hidden(fn (): bool => !auth()->user()->can('create Product')),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //đăng ký hiển thị images
            // RelationManagers\ProductImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}'),
        ];
    }

    // composer require mohamedsabil83/filament-forms-tinyeditor: cài đặt gói tinieditor
}
