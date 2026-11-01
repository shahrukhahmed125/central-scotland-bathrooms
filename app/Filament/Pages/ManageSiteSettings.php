<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

/**
 * @property-read Schema $form
 */
class ManageSiteSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Site Settings';
    protected static ?int $navigationSort = 1;
    protected string $view = 'filament.pages.manage-site-settings';

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
                    Section::make('Branding')
                        ->description('Logo for the admin panel.')
                        ->schema([
                            FileUpload::make('logo')
                                ->label('Admin Logo')
                                ->image()
                                ->disk('public')
                                ->directory('branding')
                                ->visibility('public')
                                ->helperText('Upload a logo for the admin panel (recommended size: 200x50px).')
                                ->columnSpanFull(),
                        ])
                        ->columnSpanFull(),

                    Section::make('Business Information')
                        ->description('Your company details displayed throughout the website.')
                        ->schema([
                            TextInput::make('company_name')
                                ->label('Company Name')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('whatsapp')
                                ->label('WhatsApp Number')
                                ->tel()
                                ->maxLength(255),
                            TextInput::make('email')
                                ->email()
                                ->maxLength(255),
                            Textarea::make('address')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                    Section::make('Social Media')
                        ->schema([
                            TextInput::make('facebook_url')
                                ->label('Facebook URL')
                                ->url(),
                            TextInput::make('instagram_url')
                                ->label('Instagram URL')
                                ->url(),
                        ])
                        ->columns(2)
                        ->columnSpanFull(),
                    Section::make('Footer')
                        ->schema([
                            Textarea::make('footer_text')
                                ->label('Footer Text')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])
                        ->columnSpanFull(),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Save Settings')
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
            $record = new SiteSetting();
            $record->id = 1;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Settings saved successfully')
            ->send();
    }

    public function getRecord(): ?SiteSetting
    {
        return SiteSetting::current();
    }
}
