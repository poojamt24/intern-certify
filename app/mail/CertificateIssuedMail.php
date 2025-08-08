<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;

class CertificateIssuedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $cert_id;
    public $course;
    public $download_link;
    public $verify_link;
    public $pdfContent;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $cert_id, $course, $download_link, $verify_link, $pdfContent)
    {
        $this->name = $name;
        $this->cert_id = $cert_id;
        $this->course = $course;
        $this->download_link = $download_link;
        $this->verify_link = $verify_link;
        $this->pdfContent = $pdfContent;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Internship Certificate')
                    ->view('emails.certificate_issued') // Blade view to render
                    ->attachData($this->pdfContent, "Certificate-{$this->cert_id}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}
