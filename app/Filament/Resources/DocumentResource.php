<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Models\Document;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $slug = 'documents';

    protected static ?string $navigationLabel = 'Документы';
    protected static ?string $pluralLabel = 'Документы';
    protected static ?string $label = 'Документы';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required(),

                DatePicker::make('published_at')
                    ->label('Опубликовано'),

                TextInput::make('views')
                    ->default(0)
                    ->label('Кол-во просмотров')
                    ->integer(),

                Checkbox::make('is_relevant')
                    ->default(true)
                    ->label('Актуально'),

                TextInput::make('description')
                    ->label('Описание'),

                Checkbox::make('is_active')
                    ->default(true)
                    ->label('Активно'),

                FileUpload::make('file_path')
                    ->label('Файл')
                    ->directory('documents'),

                Select::make('type_id')
                    ->label('Тип')
                    ->relationship('type', 'title')
                    ->preload()
                    ->searchable(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Document $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Document $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Опубликовано')
                    ->date()
                    ->sortable(),

                TextColumn::make('views')
                    ->label('Кол-во просмотров')
                    ->sortable(),

                ToggleColumn::make('is_relevant')
                    ->label('Актуально')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Активно')
                    ->sortable(),

                TextColumn::make('type.title')
                    ->label('Тип')
                    ->sortable(),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
