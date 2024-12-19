<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\FailedJob;
use App\Models\Job;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostOverview extends BaseWidget
{

    public string $status;
    protected static ?string $pollingInterval = '5s';
    protected function getStats(): array
    {
        $jobs = Job::count();
        $failedJob = FailedJob::count();
        $publishedPosts = Post::where('status', 'published')->count();
        return [
            Stat::make('Queue To Generate', $jobs)->color('success'),
            Stat::make('Failed Queue', $failedJob)->color('danger'),
            Stat::make('Total Publis Posts', $publishedPosts)->color('primary'),
        ];
    }
}
