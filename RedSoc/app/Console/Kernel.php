<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Seguimiento; // Importar el modelo Seguimiento
use App\Jobs\EnviarRecordatorioSeguimiento; // Importar el job EnviarRecordatorioSeguimiento
use Illuminate\Support\Facades\Mail; // Importar la fachada Mail
use Illuminate\Support\Facades\Log;


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
        // $schedule->command('inspire')->hourly();
        //$schedule->job(new EnviarRecordatorioSeguimiento)->daily(); 
        $schedule->call(function () {
            // Obtener la fecha de mañana 
            $manana = now()->addDay()->toDateString();

            // Obtener los seguimientos cuya fecha sea igual a mañana 
            $seguimientos = Seguimiento::where('fecha', $manana)->get();

            // Recorrer los seguimientos 
            foreach ($seguimientos as $seguimiento) {
                // Despachar el job para enviar el correo recordatorio al usuario 
                EnviarRecordatorioSeguimiento::dispatch($seguimiento);
            }
            Log::info('Comando schedule ejecutado');
        })->everyMinute();
        //2023-03-27 00:13:01
        //everyMinute()
        //dailyAt('7:00')
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
