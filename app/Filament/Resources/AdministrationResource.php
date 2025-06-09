<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministrationResource\Pages;
use App\Models\Administration;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdministrationResource extends Resource
{
    protected static ?string $model = Administration::class;

    protected static ?string $slug = 'administrations';

    protected static ?string $navigationLabel = 'Администрация';
    protected static ?string $pluralLabel = 'Администрация';
    protected static ?string $label = 'Администрация';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fio')
                    ->label('ФИО')
                    ->required(),

                TextInput::make('position')
                    ->label('Должность')
                    ->required(),

                Textarea::make('intake')
                    ->label('Дни и часы приема')
                    ->required(),

                TextInput::make('contact')
                    ->label('Контакт')
                    ->required(),

                FileUpload::make('image')
                    ->label('Изображение')
                    ->image(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Administration $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Administration $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fio')
                    ->label('ФИО'),

                TextColumn::make('position')
                    ->label('Должность'),

                TextColumn::make('intake')
                    ->label('Прием'),

                TextColumn::make('contact')
                    ->label('Контакт'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdministrations::route('/'),
            'create' => Pages\CreateAdministration::route('/create'),
            'edit' => Pages\EditAdministration::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
