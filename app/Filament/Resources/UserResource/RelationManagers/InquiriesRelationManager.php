<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Column;
use Illuminate\Support\Facades\Storage;

class InquiriesRelationManager extends RelationManager
{
    protected static string $relationship = 'inquiry';
    protected static ?string $navigationLabel = 'فرم های استعلام';
    protected static ?string $title = 'فرم های استعلام';
    protected static ?string $modelLabel = 'فرم استعلام';
    protected static ?string $pluralModelLabel  = 'فرم های استعلام';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('file')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('file')
            ->columns([
                Tables\Columns\TextColumn::make('file')
                ->formatStateUsing(fn ($record) => 
                        Action::make('دانلود')
                            ->url(fn () => Storage::disk('public')->url('/' . $record->file)) 
                            ->openUrlInNewTab() 
                    )
                    ->label('فایل'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
