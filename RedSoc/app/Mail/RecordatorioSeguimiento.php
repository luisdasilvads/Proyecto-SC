<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordatorioSeguimiento extends Mailable
{
    use Queueable, SerializesModels;

    // Atributo para guardar los datos del seguimiento
    public $seguimiento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seguimiento)
    {
        // Asignar el seguimiento al atributo
        $this->seguimiento = $seguimiento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Volcar y detener la ejecución para ver el contenido de $this->seguimiento
        //dd($seguimiento);
        // Definir el asunto y la vista del correo
        return $this->subject('Recordatorio de seguimiento')
                    ->view('emails.recordatorio')->with([
                        'seguimiento' => $this->seguimiento,
                    ]);
    }
}
