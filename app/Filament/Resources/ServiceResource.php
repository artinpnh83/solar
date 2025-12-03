<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'خدمات';
    protected static ?int $navigationSort = 4;
    protected static ?string $title = 'خدمات';
    protected static ?string $modelLabel = 'خدمات';
    protected static ?string $pluralModelLabel  = 'خدمات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->label('موضوع'),
                // Forms\Components\Select::make('category_id')
                //     ->relationship('category', 'name')
                //     ->required()
                //     ->label('دسته بندی'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('تصویر'),
                Forms\Components\Textarea::make('short_des')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(180)
                    ->label('توضیحات کوتاه'),
                Forms\Components\RichEditor::make('des')
                    ->required()
                    ->columnSpanFull()
                    ->label('توضیحات'),
                Forms\Components\RichEditor::make('meta')
                    ->columnSpanFull()
                    ->label('متا تگ ها'),
                Forms\Components\ToggleButtons::make('lang')
                    ->options([
                        'fa' => 'فارسی',
                        'en' => 'انگلیسی'
                    ])
                    ->inline()
                    ->default('fa')
                    ->label('زبان'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('موضوع'),
                // Tables\Columns\TextColumn::make('category.name')
                //     ->numeric()
                //     ->sortable()
                //     ->label('دسته بندی'),
                Tables\Columns\ImageColumn::make('image')
                ->label('تصویر'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
