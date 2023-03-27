<?php

namespace Tests\Feature;

use App\Models\Seguimiento;
use App\Jobs\EnviarRecordatorioSeguimiento;
use App\Mail\RecordatorioSeguimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions; // Usar este trait 
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnviarRecordatorioSeguimientoTest extends TestCase
{
    //use RefreshDatabase;

    use DatabaseTransactions; // Usar este trait 

    /** @test */
    public function it_dispatches_a_job_to_send_a_reminder_email()
    {
        // Crear un seguimiento falso 
        //$seguimiento = Seguimiento::factory()->create();
        //(`id`, `id_vinculo`, `estatus`, `avance`, `fecha`, `created_at`, `updated_at`)

        $seguimiento = Seguimiento::find(1);

        // Fingir la cola 
        Queue::fake();

        //Mail::to('luisdasilvads@gmail.com')->send(new RecordatorioMail($this->seguimiento));

        Mail::to('luisdasilvads@gmail.com')->send(new RecordatorioSeguimiento($seguimiento));
        // Despachar el job 
        EnviarRecordatorioSeguimiento::dispatch($seguimiento);

        // Verificar que se agregó a la cola 
        Queue::assertPushed(EnviarRecordatorioSeguimiento::class);

        
    }
}