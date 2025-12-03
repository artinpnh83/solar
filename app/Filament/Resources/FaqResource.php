<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationLabel = 'سوالات متداول';
    protected static ?string $title = 'سوالات متداول';
    protected static ?string $modelLabel = 'سوالات متداول';
    protected static ?string $pluralModelLabel  = 'سوالات متداول';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->maxLength(180)
                    ->label('سوال')
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('answers')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(500)
                    ->label('پاسخ'),
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
            Tables\Columns\TextColumn::make('question')
                ->searchable()
                ->label('سوال'),
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
                Tables\Actions\EditAction::make(),
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
    
    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index'); 
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
