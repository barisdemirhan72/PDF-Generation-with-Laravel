<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'PDF Document Title',
            'date' => date('Y-m-d'),
            'content' => 'This is a generated PDF document in Laravel 10+.'
        ];

        $pdf = Pdf::loadView('document', $data);
        return $pdf->download('document.pdf'); // or stream() for browser display
    }
}
