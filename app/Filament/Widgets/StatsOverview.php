<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $user = auth()->user();
        $number_total_students = $user->students->count();
        $number_total_events = Event::count();

        if ($user->isAdministrator()) {
            $number_total_students = Student::count();
        }

        return [
            Card::make('Students', $number_total_students)
                ->description('total number of student')
                ->descriptionIcon('gmdi-school-r')
                ->color('success'),
            Card::make('Events', $number_total_events)
                ->description('total number of events')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('success'),
        ];
    }
}
