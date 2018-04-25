<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        '\App\Console\Commands\LogDateTime',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //leo via ssh, make sure in one line all command
        //crontab -e
        //* * * * * /usr/local/bin/ea-php70 /home4/virnezac/mysoftwares/rahdan/artisan schedule:run >> /dev/null 2>&1
        // leo via local go to project root
        //php artisan schedule:run >> /dev/null 2>&1

        $schedule->command('logdatetime:dologdatetime')
                 ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
