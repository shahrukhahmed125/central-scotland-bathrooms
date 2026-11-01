<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\EnquiryResource\EnquiryResource;
use App\Models\Enquiry;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEnquiries extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Recent Customer Enquiries')
            ->query(
                Enquiry::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Customer Name')
                    ->weight('bold'),

                TextColumn::make('phone')
                    ->label('Phone'),

                TextColumn::make('town')
                    ->label('Town / Postcode'),

                TextColumn::make('bathroom_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'Wet wall' => 'info',
                        'Tiled' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'new' => 'danger',
                        'contacted' => 'info',
                        'quoted' => 'warning',
                        'completed' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Received')
                    ->since(),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('View')
                    ->icon('heroicon-m-eye')
                    ->url(fn (Enquiry $record): string => EnquiryResource::getUrl('view', ['record' => $record])),
            ])
            ->headerActions([
                Action::make('viewAll')
                    ->label('View All Enquiries')
                    ->icon('heroicon-m-arrow-right')
                    ->url(fn (): string => EnquiryResource::getUrl('index')),
            ])
            ->paginated(false)
            ->emptyStateHeading('No customer enquiries yet')
            ->emptyStateDescription('Customer submissions from the website contact form will appear here.');
    }
}
