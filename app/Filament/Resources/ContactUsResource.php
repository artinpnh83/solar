<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Filament\Resources\ContactUsResource\RelationManagers;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'پیام های تماس با ما';
    protected static ?string $title = 'پیام های تماس با ما';
    protected static ?string $modelLabel = 'پیام های تماس با ما';
    protected static ?string $pluralModelLabel  = 'پیام های تماس با ما';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(180)
                    ->label('نام')
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(180)
                    ->label('شماره تماس')
                    ->columnSpan('full'),
                    
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(180)
                    ->label('آدرس ایمیل')
                    ->columnSpan('full'),
                    
                    Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(180)
                    ->label('عنوان')
                    ->columnSpan('full'),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(500)
                    ->label('متن پیام'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('نام'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label('شماره تماس'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('ایمیل'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('موضوع'),
                Tables\Columns\ToggleColumn::make('status')
                    ->searchable()
                    ->label('وضعیت پاسخ'),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListContactUs::route('/'),
            'create' => Pages\CreateContactUs::route('/create'),
            // 'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
