<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFMail extends Mailable
{
use Queueable, SerializesModels;
public function build()
{
$data = [
'title' => 'PDF Email by mail',
'date' => date('Y-m-d'),
'content' => 'This is a PDF file attached to this email. letter.'
];
$pdf = Pdf::loadView('pdf.document', $data);
return $this->subject('Your PDF Document')
->view('emails.pdfmail')
->attachData($pdf->output(), "dokumentas.pdf", [
'mime' => 'application/pdf',
]);
}
}
