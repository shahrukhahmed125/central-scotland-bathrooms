<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Textarea::make('short_description')
                            ->rows(2)
                            ->maxLength(255)
                            ->columnSpanFull(),

                        RichEditor::make('description')
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'bulletList',
                                'orderedList',
                                'link',
                            ]),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->visibility('public')
                            ->columnSpanFull(),

                        Select::make('icon_type')
                            ->label('Icon Type')
                            ->options([
                                'svg' => 'SVG Artwork',
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ])
                            ->default('icon')
                            ->required()
                            ->live(),

                        TextInput::make('icon_name')
                            ->label('Icon Name')
                            ->helperText('For SVG: "wet-wall" or "tiled". For Icon: "strip", "bath", "van", "chat", etc.')
                            ->visible(fn (callable $get) => $get('icon_type') !== 'image'),

                        Select::make('icon_color')
                            ->label('Icon Color')
                            ->options([
                                'white' => 'White',
                                'orange' => 'Orange',
                                'coral' => 'Coral/Pink',
                                'brand' => 'Brand Green',
                            ])
                            ->default('white')
                            ->visible(fn (callable $get) => $get('icon_type') !== 'image'),

                        Select::make('card_style')
                            ->label('Card Style')
                            ->options([
                                'default' => 'Default (Dark Green)',
                                'coral' => 'Coral/Pink',
                                'brand' => 'Brand (Dark Green + Dark)',
                            ])
                            ->default('default'),

                        Select::make('card_span')
                            ->label('Card Size (Span)')
                            ->options([
                                5 => 'Small (5 columns)',
                                6 => 'Medium (6 columns)',
                                7 => 'Large (7 columns)',
                            ])
                            ->default(6),

                        TagsInput::make('chips')
                            ->label('Chips List')
                            ->helperText('Optional: List of items like "Baths", "Showers", etc.')
                            ->placeholder('Add item')
                            ->columnSpanFull(),

                        Repeater::make('chip_icons')
                            ->label('Chip Icons (Optional)')
                            ->helperText('Add icons to chips. Each item needs a label (must match chip text) and an icon name.')
                            ->schema([
                                TextInput::make('label')
                                    ->label('Label')
                                    ->required()
                                    ->helperText('Must match the chip text exactly'),
                                TextInput::make('icon')
                                    ->label('Icon Name')
                                    ->required()
                                    ->helperText('Heroicon name without "i-" prefix, e.g., "sun", "home", "phone"'),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->inline(false),

                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->integer()
                            ->default(0),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
