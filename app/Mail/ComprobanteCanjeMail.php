<?php

namespace App\Mail;

use App\Models\Colaborador;
use App\Models\Producto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComprobanteCanjeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $colaborador;
    public $producto;
    public $codigoCanje;

    public function __construct(Colaborador $colaborador, Producto $producto, string $codigoCanje)
    {
        $this->colaborador = $colaborador;
        $this->producto = $producto;
        $this->codigoCanje = $codigoCanje;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Canje Exitoso! 🎉 - Tu código de validación #' . $this->codigoCanje,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.comprobante-canje',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}