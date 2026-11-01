<?php

namespace App\Filament\Resources\EnquiryResource;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Models\Enquiry;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Inbox;

    protected static ?string $navigationLabel = 'Enquiries';

    protected static ?string $modelLabel = 'Enquiry';

    protected static ?string $pluralModelLabel = 'Enquiries';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enquiry Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->disabled(),

                        TextInput::make('phone')
                            ->required()
                            ->disabled(),

                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->disabled(),

                        TextInput::make('town')
                            ->required()
                            ->maxLength(255)
                            ->disabled(),

                        Select::make('bathroom_type')
                            ->options([
                                'Wet wall' => 'Wet wall',
                                'Tiled' => 'Tiled',
                                'Not sure yet' => 'Not sure yet',
                            ])
                            ->required()
                            ->disabled(),

                        Select::make('best_time_to_call')
                            ->options([
                                'Any time' => 'Any time',
                                'Morning' => 'Morning',
                                'Afternoon' => 'Afternoon',
                                'Evening' => 'Evening',
                            ])
                            ->disabled(),

                        Textarea::make('message')
                            ->rows(5)
                            ->disabled(),

                        Select::make('status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'quoted' => 'Quoted',
                                'completed' => 'Completed',
                                'archived' => 'Archived',
                            ])
                            ->required()
                            ->default('new')
                            ->live(),

                        TextInput::make('ip_address')
                            ->label('IP Address')
                            ->disabled()
                            ->hidden(fn (string $operation) => $operation === 'create'),

                        Textarea::make('user_agent')
                            ->label('User Agent')
                            ->rows(3)
                            ->disabled()
                            ->hidden(fn (string $operation) => $operation === 'create'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),

                \Filament\Tables\Columns\TextColumn::make('town')
                    ->searchable()
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('bathroom_type')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Wet wall' => 'info',
                        'Tiled' => 'warning',
                        'Not sure yet' => 'gray',
                    }),

                \Filament\Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'completed' => 'Completed',
                        'archived' => 'Archived',
                    ])
                    ->sortable(),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                \Filament\Actions\ViewAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'contacted' => 'Contacted',
                        'quoted' => 'Quoted',
                        'completed' => 'Completed',
                        'archived' => 'Archived',
                    ]),
            ])
            ->emptyStateHeading('No enquiries yet')
            ->emptyStateDescription('Enquiries submitted from the contact form will appear here.');
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEnquiries::route('/'),
            'view' => Pages\ViewEnquiry::route('/{record}'),
        ];
    }
}
