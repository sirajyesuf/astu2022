<?php

namespace App\Filament\Widgets;

use App\Models\DeptGroupPhoto;
use App\Models\Student;
use App\Models\Event;
use App\Models\Token;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $user = auth()->user();
        $number_total_events = Event::count();
        $number_total_groupPhotos = DeptGroupPhoto::count();



        if ($user->isAdministrator()) {
            $number_total_students = Student::count();
            $number_total_clients = Token::count();

            return [
                Card::make('Students', $number_total_students)
                    ->description('total number of student')
                    ->descriptionIcon('gmdi-school-r')
                    ->color('success'),
                Card::make('Events', $number_total_events)
                    ->description('total number of events')
                    ->descriptionIcon('heroicon-o-calendar')
                    ->color('success'),
                Card::make('Clients', $number_total_clients)
                    ->description('total number of clients')
                    ->descriptionIcon('heroicon-s-key')
                    ->color('success'),
                Card::make('Group Photos', $number_total_groupPhotos)
                    ->description('total number of total dept group photos')
                    ->descriptionIcon('heroicon-s-photograph')
                    ->color('success')

            ];
        }
        if ($user->isEditor()) {

            $number_total_students = $user->students->count();


            return [
                Card::make('Students', $number_total_students)
                    ->description('total number of student')
                    ->descriptionIcon('gmdi-school-r')
                    ->color('success'),
                Card::make('Events', $number_total_events)
                    ->description('total number of events')
                    ->descriptionIcon('heroicon-o-calendar')
                    ->color('success'),
                Card::make('Group Photos', $number_total_groupPhotos)
                    ->description('total number of dept group photos')
                    ->descriptionIcon('heroicon-s-photograph')
                    ->color('success')

            ];
        }
    }
}
