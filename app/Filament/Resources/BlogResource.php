<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
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
use Filament\Forms\Get;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'مقالات';
    protected static ?int $navigationSort = 5;
    protected static ?string $title = 'مقالات';
    protected static ?string $modelLabel = 'مقاله';
    protected static ?string $pluralModelLabel = 'مقالات';

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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->label('موضوع'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('تصویر'),
                Forms\Components\Textarea::make('short_des')
                    ->required()
                    ->maxLength(150)
                    ->label('توضیحات کوتاه'),
                Forms\Components\RichEditor::make('des')
                    ->required()
                    ->columnSpanFull()
                    ->label('توضیحات')
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('s3')
                    ->fileAttachmentsDirectory('attachments')
                    ->fileAttachmentsVisibility('private'),
                Forms\Components\RichEditor::make('meta')
                    ->columnSpanFull()
                    ->label('متا تگ ها'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('موضوع'),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
