<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use App\Models\Project;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $newEnquiries = Enquiry::where('status', 'new')->count();
        $totalEnquiries = Enquiry::count();
        $activeProjects = Project::where('is_active', true)->count();
        $activeServices = Service::where('is_active', true)->count();

        return [
            Stat::make('New Enquiries', $newEnquiries)
                ->description($newEnquiries === 1 ? '1 enquiry awaiting response' : "{$newEnquiries} enquiries awaiting response")
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color($newEnquiries > 0 ? 'warning' : 'success'),

            Stat::make('Total Enquiries', $totalEnquiries)
                ->description('All-time customer leads')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),

            Stat::make('Showcase Projects', $activeProjects)
                ->description('Active gallery projects')
                ->descriptionIcon('heroicon-m-photo')
                ->color('info'),

            Stat::make('Active Services', $activeServices)
                ->description('Published refit services')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('success'),
        ];
    }
}
