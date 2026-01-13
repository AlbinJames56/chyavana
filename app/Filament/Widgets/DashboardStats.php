<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Doctors;
use App\Models\PainTechnique;
use App\Models\Testimonial;
use App\Models\Treatment;
use App\Filament\Resources\Appointments\AppointmentResource;
use App\Filament\Resources\Blogs\BlogResource;
use App\Filament\Resources\Doctors\DoctorsResource;
use App\Filament\Resources\PainTechniques\PainTechniqueResource;
use App\Filament\Resources\Testimonials\TestimonialResource;
use App\Filament\Resources\Treatments\TreatmentResource;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Appointments', Appointment::query()->count())
                ->description('Manage Appointments')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary')
                ->url(AppointmentResource::getUrl()),
            
            Stat::make('Blogs', Blog::query()->count())
                ->description('Manage Blogs')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success')
                ->url(BlogResource::getUrl()),

            Stat::make('Doctors', Doctors::query()->count())
                ->description('Manage Doctors')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info')
                ->url(DoctorsResource::getUrl()),

            Stat::make('Pain Techniques', PainTechnique::query()->count())
                ->description('Manage Pain Techniques')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('warning')
                ->url(PainTechniqueResource::getUrl()),

            Stat::make('Testimonials', Testimonial::query()->count())
                ->description('Manage Testimonials')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('secondary')
                ->url(TestimonialResource::getUrl()),

            Stat::make('Treatments', Treatment::query()->count())
                ->description('Manage Treatments')
                ->descriptionIcon('heroicon-m-heart')
                ->color('danger')
                ->url(TreatmentResource::getUrl()),
        ];
    }
}
