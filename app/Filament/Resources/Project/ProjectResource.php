<?php

namespace App\Filament\Resources\Project;

use App\Filament\Resources\Project\Pages;
use App\Models\Project;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Photo;

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $modelLabel = 'Project';

    protected static ?string $pluralModelLabel = 'Projects';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('category')
                            ->label('Category')
                            ->options([
                                'wet-wall' => 'Wet Wall',
                                'tiled' => 'Tiled',
                                'shower' => 'Shower Room',
                            ])
                            ->required()
                            ->default('wet-wall'),

                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->helperText('Optional description for the lightbox caption')
                            ->rows(3)
                            ->columnSpanFull(),

                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->helperText('Featured projects will appear first in the gallery')
                            ->default(false),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->label('Sort Order'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->size(80),

                \Filament\Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'wet-wall' => 'Wet Wall',
                        'tiled' => 'Tiled',
                        'shower' => 'Shower Room',
                        default => $state,
                    })
                    ->sortable(),

                \Filament\Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),

                \Filament\Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),

                \Filament\Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->label('Order'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                \Filament\Actions\EditAction::make(),
            ])
            ->toolbarActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
