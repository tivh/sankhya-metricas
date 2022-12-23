<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Run the tasks
        $schedule->command('export:saldo')->everyThirtyMinutes();
        // exportar faturamento para o protheus
        $schedule->command('export:fat')->everyThirtyMinutes();
        $schedule->command('export:saldoRastro')->everyThirtyMinutes();
        $schedule->command('export:vendedor_fat')->cron('* 8 1 * *');
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
