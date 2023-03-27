<?php

namespace App\Jobs;

use App\Models\Seguimiento; // Importar el modelo Seguimiento
use App\Mail\RecordatorioSeguimiento; // Importar la clase RecordatorioMail
use Illuminate\Support\Facades\Mail; // Importar la fachada Mail
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EnviarRecordatorioSeguimiento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Atributo para guardar los datos del seguimiento
    public $seguimiento;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($seguimiento)
    {
        // Asignar el seguimiento al atributo
        $this->seguimiento = $seguimiento;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Obtener el email del usuario relacionado con el seguimiento 
        //$email = $this->seguimiento->vinculo->email;

        // Enviar el correo recordatorio al usuario 
        Mail::to('luisdasilvads@gmail.com')->send(new RecordatorioSeguimiento($this->seguimiento));
        //‘juan@gmail.com’
        Log::info('Job ejecutado');
    }
}