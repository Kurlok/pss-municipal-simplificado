<?php

namespace App\Mail;

use App\Inscricao;
use App\Vaga;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmacaoInscricao extends Mailable
{
    use Queueable, SerializesModels;

    protected $inscricao;
    protected $emprego;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inscricao $inscricao, Vaga $emprego)
    {
        $this->inscricao = $inscricao;
        $this->emprego = $emprego;

        return $this->from('felipe.augum@gmail.com')
        ->subject('Confirmação de Inscrição - PSS nº 01/2019 - Prefeitura Municipal de Palmeira-PR')
        ->view('confirmacao');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('confirmacao')
        ->with([
            'inscricao' => $this->inscricao,
            'emprego' => $this->emprego
        ]);
    }
}
