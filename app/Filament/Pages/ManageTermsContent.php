<?php

namespace App\Filament\Pages;

use App\Models\TermsContent;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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
class ManageTermsContent extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Terms of Use Page';
    protected static ?int $navigationSort = 6;
    protected string $view = 'filament.pages.manage-terms-content';

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
                    Section::make('Page Header')
                        ->description('Main page heading and last revision date.')
                        ->schema([
                            TextInput::make('hero_title')
                                ->label('Page Title / Heading')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('last_updated')
                                ->label('Last Updated Date')
                                ->placeholder('14 October 2026')
                                ->required()
                                ->maxLength(100),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),

                    Section::make('Terms of Use Content')
                        ->description('The full legal terms body text. Use headings, paragraphs, and lists to structure your terms.')
                        ->schema([
                            RichEditor::make('content')
                                ->label('Document Content')
                                ->required()
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'strike',
                                    'h2',
                                    'h3',
                                    'bulletList',
                                    'orderedList',
                                    'link',
                                    'undo',
                                    'redo',
                                ])
                                ->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Search Engine Optimization (SEO) & Social Sharing')
                        ->description('Manage how the terms page appears on search engines and social media.')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('Meta Title')
                                ->placeholder('Terms of Use | Central Scotland Bathroom Consultancy')
                                ->maxLength(255)
                                ->helperText('Recommended length: 50-60 characters.'),
                            TextInput::make('meta_keywords')
                                ->label('Meta Keywords')
                                ->placeholder('terms of use, terms and conditions, scotland bathrooms')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('Meta Description')
                                ->placeholder('Terms of use for the Central Scotland Bathroom Consultancy website...')
                                ->rows(3)
                                ->maxLength(500)
                                ->helperText('Recommended length: 150-160 characters.')
                                ->columnSpanFull(),
                            TextInput::make('og_title')
                                ->label('Social Share Title (OG / Twitter)')
                                ->placeholder('Terms of use')
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
                                ->placeholder('Terms of use for the Central Scotland Bathroom Consultancy website...')
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
            $record = new TermsContent();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Terms of use content saved successfully')
            ->send();
    }

    public function getRecord(): ?TermsContent
    {
        return TermsContent::current();
    }
}
