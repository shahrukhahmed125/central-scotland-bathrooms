<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                            ->rows(3)
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
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
