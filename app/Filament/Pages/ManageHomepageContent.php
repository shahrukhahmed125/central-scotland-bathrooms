<?php

namespace App\Filament\Pages;

use App\Models\HomepageContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions as SchemaActions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

/**
 * @property-read Schema $form
 */
class ManageHomepageContent extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Homepage Content';
    protected static ?int $navigationSort = 2;
    protected string $view = 'filament.pages.manage-homepage-content';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray() ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Section::make('Hero Section')
                        ->schema([
                            TextInput::make('hero_title')
                                ->label('Hero Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('hero_lead')
                                ->label('Hero Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Day Section')
                        ->schema([
                            TextInput::make('day_title')
                                ->label('Section Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('day_lead')
                                ->label('Section Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                            Repeater::make('day_stops')
                                ->label('Daily Updates')
                                ->schema([
                                    TextInput::make('icon')
                                        ->label('Icon Name')
                                        ->helperText('Heroicon name without "i-" prefix, e.g., "sun", "home", "sunset"')
                                        ->required(),
                                    TextInput::make('when')
                                        ->label('Time Label')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->maxLength(255),
                                    Textarea::make('description')
                                        ->label('Description')
                                        ->required()
                                        ->rows(2),
                                ])
                                ->columns(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Promise Section')
                        ->schema([
                            TextInput::make('promise_amount')
                                ->label('Promise Amount')
                                ->required()
                                ->maxLength(50),
                            TextInput::make('promise_caption')
                                ->label('Promise Caption')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('promise_title')
                                ->label('Section Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('promise_lead')
                                ->label('Section Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                            Repeater::make('promise_list')
                                ->label('Promise List Items')
                                ->simple(
                                    TextInput::make('item')
                                        ->label('Item')
                                        ->required()
                                        ->maxLength(255)
                                )
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Walls Section')
                        ->schema([
                            TextInput::make('walls_title')
                                ->label('Section Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('walls_lead')
                                ->label('Section Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                            TextInput::make('tiles_title')
                                ->label('Tiled Walls Title')
                                ->required()
                                ->maxLength(255),
                            Repeater::make('tiles_list')
                                ->label('Tiled Walls Features')
                                ->simple(
                                    TextInput::make('item')
                                        ->label('Feature')
                                        ->required()
                                        ->maxLength(255)
                                )
                                ->columnSpanFull(),
                            TextInput::make('panels_title')
                                ->label('Wet Wall Panels Title')
                                ->required()
                                ->maxLength(255),
                            Repeater::make('panels_list')
                                ->label('Wet Wall Panels Features')
                                ->simple(
                                    TextInput::make('item')
                                        ->label('Feature')
                                        ->required()
                                        ->maxLength(255)
                                )
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Process Section')
                        ->schema([
                            TextInput::make('process_title')
                                ->label('Section Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('process_lead')
                                ->label('Section Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                            Repeater::make('process_steps')
                                ->label('Process Steps')
                                ->schema([
                                    TextInput::make('icon')
                                        ->label('Icon Name')
                                        ->helperText('Heroicon name without "i-" prefix, e.g., "strip", "wrench", "van", "thumb"')
                                        ->required(),
                                    TextInput::make('title')
                                        ->label('Title')
                                        ->required()
                                        ->maxLength(255),
                                    Textarea::make('description')
                                        ->label('Description')
                                        ->required()
                                        ->rows(2),
                                ])
                                ->columns(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('CTA Section')
                        ->schema([
                            TextInput::make('cta_title')
                                ->label('CTA Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('cta_lead')
                                ->label('CTA Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                            TextInput::make('since_year')
                                ->label('Since Year')
                                ->numeric()
                                ->required()
                                ->default(2019),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how this page appears on Google search results and social media cards.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Bathroom Fitters in Central Scotland | Central Scotland Bathroom Consultancy')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('bathroom fitters, wet wall, tiled bathrooms, Scotland')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Wet wall and tiled bathroom refits across Central Scotland since 2019...')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->placeholder('A new bathroom, without the worry')
                                ->maxLength(255)
                                ->helperText('Leave blank to use the Meta Title.'),
                            FileUpload::make('og_image')
                                ->label('Social Share Image (OG Image)')
                                ->image()
                                ->disk('public')
                                ->directory('seo')
                                ->visibility('public')
                                ->helperText('Recommended size: 1200x630 pixels. Defaults to branding og-image if blank.'),
                            Textarea::make('og_description')
                                ->label('Social Share Description (OG / Twitter)')
                                ->placeholder('Wet wall and tiled bathrooms across Central Scotland...')
                                ->rows(2)
                                ->maxLength(500)
                                ->helperText('Leave blank to use the Meta Description.')
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        SchemaActions::make([
                            Action::make('save')
                                ->label('Save Content')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (!$record) {
            $record = new HomepageContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Homepage content saved successfully')
            ->send();
    }

    public function getRecord(): ?HomepageContent
    {
        return HomepageContent::current();
    }
}
