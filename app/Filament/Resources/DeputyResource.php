<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeputyResource\Pages;
use App\Models\Deputy;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeputyResource extends Resource
{
    protected static ?string $model = Deputy::class;

    protected static ?string $slug = 'deputies';

    protected static ?string $navigationLabel = 'Депутаты';
    protected static ?string $pluralLabel = 'Депутаты';
    protected static ?string $label = 'Депутаты';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fio')
                    ->label('ФИО')
                    ->required(),

                DatePicker::make('birth_date')
                    ->label('Дата рождения')
                    ->required(),

                TextInput::make('position')
                    ->label('Должность')
                    ->required(),

                TextInput::make('phone')
                    ->label('Телефон')
                    ->required(),

                FileUpload::make('image')
                    ->label('Изображение')
                    ->image(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Deputy $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Deputy $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fio')
                    ->label('ФИО'),

                TextColumn::make('birth_date')
                    ->label('Дата рождения')
                    ->date(),

                TextColumn::make('position')
                    ->label('Должность'),

                TextColumn::make('phone')
                    ->label('Телефон'),
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
            'index' => Pages\ListDeputies::route('/'),
            'create' => Pages\CreateDeputy::route('/create'),
            'edit' => Pages\EditDeputy::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
