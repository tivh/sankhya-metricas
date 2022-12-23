<?php

namespace App\Mail;

use App\Helpers\Utils;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFatVendedor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = 'app/VENDEDOR/faturamento_vendedor_' . date('d_m_Y') . '.xlsx';
        $pathEmail = storage_path($fileName);
        $this->view('email.mail_vend')->attach($pathEmail)->subject('Faturamento por vendedor');
    }
}
