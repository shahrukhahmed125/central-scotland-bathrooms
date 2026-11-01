<?php

namespace App\Filament\Pages;

use App\Models\GalleryContent;
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
class ManageGalleryContent extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Gallery Page Content';
    protected static ?int $navigationSort = 4;
    protected string $view = 'filament.pages.manage-gallery-content';

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
                        ->description('Top banner with the main page heading and intro copy.')
                        ->schema([
                            TextInput::make('hero_eyebrow')
                                ->label('Eyebrow Tag')
                                ->placeholder('OUR WORK')
                                ->maxLength(100),
                            TextInput::make('hero_title')
                                ->label('Hero Title')
                                ->required()
                                ->maxLength(255),
                            Textarea::make('hero_lead')
                                ->label('Hero Lead')
                                ->required()
                                ->rows(3)
                                ->columnSpanFull(),
                            TextInput::make('hero_note')
                                ->label('Hero Subnote')
                                ->placeholder('Wet wall and tiled bathrooms, fitted with care since 2019.')
                                ->maxLength(255)
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
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how the gallery page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Gallery | Scotland Bathrooms')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('bathroom gallery, bathroom installations, wet wall panels, tiled bathrooms, central scotland')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Explore our completed bathroom installations across Central Scotland...')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->placeholder('Bathroom Transformations Across Central Scotland')
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
                                ->placeholder('Explore our completed bathroom installations across Central Scotland...')
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
            $record = new GalleryContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Gallery page content saved successfully')
            ->send();
    }

    public function getRecord(): ?GalleryContent
    {
        return GalleryContent::current();
    }
}
