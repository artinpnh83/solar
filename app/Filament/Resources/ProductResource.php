<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Get;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'محصولات';
    protected static ?int $navigationSort = 2;
    protected static ?string $title = 'محصولات';
    protected static ?string $modelLabel = 'محصولات';
    protected static ?string $pluralModelLabel  = 'محصولات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ToggleButtons::make('lang')
                    ->options([
                        'fa' => 'فارسی',
                        'en' => 'انگلیسی'
                    ])
                    ->inline()
                    ->live()
                    ->default('fa')
                    ->label('زبان'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('نام'),
                Forms\Components\Select::make('category_id')
                    ->options(
                    function (Get $get) {
                        return Category::where('lang', $get('lang'))->where('cat', 1)
                            ->get()->pluck('name', 'id');
                    })
                    ->required()
                    ->label('دسته بندی'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('تصویر اصلی'),
                Forms\Components\RichEditor::make('features')
                    ->columnSpanFull()
                    // ->required()
                    ->label('ویژگی ها'),
                Forms\Components\RichEditor::make('structure')
                    ->columnSpanFull()
                    // ->required()
                    ->label('ساختار'),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    // ->required()
                    ->label('توضیحات'),
                Forms\Components\RichEditor::make('meta')
                    ->columnSpanFull()
                    ->label('متا تگ ها'),
                Forms\Components\ToggleButtons::make('active')
                    ->required()
                    ->boolean()
                    ->inline()
                    ->default(1)
                    ->label('این محصول در حال نمایش است؟'),
                
                Forms\Components\Repeater::make('gallery')
                    ->relationship('gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                        ->image()
                        ->required()
                        ->label('گالری تصاویر'),
                    ])->label('گالری تصاویر')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('نام'),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable()
                    ->label('دسته بندی'),
                Tables\Columns\ImageColumn::make('image')
                ->label('تصویر'),
                Tables\Columns\SelectColumn::make('active')
                ->options([
                    0 => 'رد',
                    1 => 'تایید'
                ])
                ->selectablePlaceholder(false)
                    ->label('وضعیت'),
                    Tables\Columns\SelectColumn::make('lang')
                    ->options([
                        'fa' => 'فارسی',
                        'en' => 'انگلیسی'
                    ])
                    ->selectablePlaceholder(false)
                    ->searchable()
                    ->label('زبان'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاریخ ثبت'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('تاریخ ویرایش'),
            ])
            ->filters([
                TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function create(): ?string
    {
        return static::getUrl('index'); 
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
