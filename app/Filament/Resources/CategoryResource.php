<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
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

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'دسته بندی‌ها';
    protected static ?string $title = 'دسته بندی‌ها';
    protected static ?string $modelLabel = 'دسته بندی';
    protected static ?string $pluralModelLabel  = 'دسته بندی‌ها';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100)
                    ->label('نام'),
                Forms\Components\Select::make('parent_id')
                    ->relationship('parent', 'name',
                    fn (Builder $query) => $query->where('cat', 0),
                    )
                    ->default(null)
                    ->label('دسته بندی مادر'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('تصویر'),
                Forms\Components\FileUpload::make('icon')
                    ->image()
                    ->label('آیکن'),
                Forms\Components\ToggleButtons::make('cat')
                    ->required()
                    ->boolean()
                    ->inline()
                    ->label('دارای محصول'),
                Forms\Components\RichEditor::make('des')
                ->columnSpan('full')
                    ->label('توضیحات'),
                Forms\Components\ToggleButtons::make('lang')
                    ->options([
                        'fa' => 'فارسی',
                        'en' => 'انگلیسی'
                    ])->inline()
                        ->default('fa')
                        ->label('زبان'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('نام'),
                Tables\Columns\TextColumn::make('parent.name')
                    ->sortable()
                    ->default('ندارد')
                    ->label('دسته بندی مادر'),
                Tables\Columns\ImageColumn::make('image')
                ->label('تصویر'),
                Tables\Columns\ImageColumn::make('icon')
                    ->searchable()
                    ->label('آیکن'),
                Tables\Columns\SelectColumn::make('cat')
                     ->options([
                            0 => 'خیر',
                            1 => 'بله',
                        ])
                        ->selectablePlaceholder(false)
                    ->sortable()
                    ->disabled()
                    ->label('دارای محصول'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
