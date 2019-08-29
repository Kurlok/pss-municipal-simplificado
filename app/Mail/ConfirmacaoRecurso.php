<?php

namespace App\Mail;

use App\Recurso;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacaoRecurso extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $recurso;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recurso $recurso)
    {
        $this->recurso = $recurso;

        return $this->from('pss@palmeira.pr.gov.br')
            ->subject('Confirmação de envio de recurso - PSS nº 01/2019 - Prefeitura Municipal de Palmeira-PR')
            ->view('confirmacaoRecurso');
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('confirmacaoREcurso')
            ->with([
                'recurso' => $this->recurso,
            ]);
    }
}
