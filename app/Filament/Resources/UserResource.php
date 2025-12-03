<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 11;
    protected static ?string $navigationLabel = 'کاربران';
    protected static ?string $title = 'کاربران';
    protected static ?string $modelLabel = 'کاربر';
    protected static ?string $pluralModelLabel  = 'کاربران';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(191)
                    ->default(null)
                    ->label('نام'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(191)
                    ->default(null)
                    ->label('ایمیل'),
                Forms\Components\TextInput::make('phone')
                ->disabledOn('edit')
                    ->tel()
                    ->required()
                    ->maxLength(191)
                    ->label('شماره تماس'),
                Forms\Components\Select::make('active')
                ->options([
                        1 => 'احراز شده',
                        0 => 'احراز نشده',
                    ])
                    ->selectablePlaceholder(false)
                    ->required()
                    ->label('وضعیت'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('نام'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->label('ایمیل'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->label('شماره تماس'),
                Tables\Columns\SelectColumn::make('active')
                    ->options([
                        1 => 'احراز شده',
                        0 => 'احراز نشده',
                    ])->selectablePlaceholder(false)
                    ->sortable()
                    ->label('وضعیت'),
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
            // RelationManagers\InquiriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
