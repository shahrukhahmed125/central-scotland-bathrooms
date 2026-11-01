<?php

namespace App\Filament\Pages;

use App\Models\ServicesContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
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
class ManageServicesContent extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Services Page Content';
    protected static ?int $navigationSort = 3;
    protected string $view = 'filament.pages.manage-services-content';

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
                        ->description('Top banner with the main page heading and intro lead.')
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

                    Section::make('Services Bento Grid Intro')
                        ->description('Header text displayed above the services cards.')
                        ->schema([
                            TextInput::make('services_title')
                                ->label('Section Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('services_lead')
                                ->label('Section Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('£0 Guarantee Ribbon')
                        ->description('The payment guarantee banner between the services grid and FAQs.')
                        ->schema([
                            TextInput::make('guarantee_amount')
                                ->label('Guarantee Amount')
                                ->required()
                                ->maxLength(50),
                            TextInput::make('guarantee_title')
                                ->label('Guarantee Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('guarantee_lead')
                                ->label('Guarantee Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('FAQ Section Intro')
                        ->description('Header text above the collapsible FAQ list.')
                        ->schema([
                            TextInput::make('faq_title')
                                ->label('FAQ Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('faq_lead')
                                ->label('FAQ Lead')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('CTA Section')
                        ->description('The call to action band at the bottom of the page.')
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
                        ->description('Manage how the services page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Services | Scotland Bathrooms')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('bathroom refits, wet wall, tiled bathrooms, central scotland')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Wet wall and tiled bathroom refits across Central Scotland...')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->placeholder('Bathroom refits, from strip-out to sign-off')
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
            $record = new ServicesContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Services page content saved successfully')
            ->send();
    }

    public function getRecord(): ?ServicesContent
    {
        return ServicesContent::current();
    }
}
