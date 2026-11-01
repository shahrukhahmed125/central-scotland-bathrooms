<?php

namespace App\Filament\Pages;

use App\Models\ContactContent;
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
class ManageContactContent extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Page Content';
    protected static ?int $navigationSort = 5;
    protected string $view = 'filament.pages.manage-contact-content';

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

                    Section::make('Direct Contact & Coverage Area')
                        ->description('Sidebar headings and the Central Scotland coverage notice.')
                        ->schema([
                            TextInput::make('direct_title')
                                ->label('Channels Section Heading')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('coverage_title')
                                ->label('Coverage Notice Heading')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('coverage_text')
                                ->label('Coverage Notice Text')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Quote Request Form Copy')
                        ->description('Headings and helper text inside the quote request card.')
                        ->schema([
                            TextInput::make('form_title')
                                ->label('Form Title')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('form_note')
                                ->label('Footer Note Below Submit')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('form_lead')
                                ->label('Form Lead Subtitle')
                                ->required()
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how the contact page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Contact | Scotland Bathrooms')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('contact scotland bathrooms, bathroom quote, central scotland')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Get in touch with Robert for a bathroom quote across Central Scotland...')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->placeholder('Let’s talk about your bathroom.')
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
                                ->placeholder('Call, WhatsApp or email Robert, or send your details...')
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
            $record = new ContactContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Contact page content saved successfully')
            ->send();
    }

    public function getRecord(): ?ContactContent
    {
        return ContactContent::current();
    }
}
