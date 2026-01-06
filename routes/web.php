<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

// PDF üretme (Sadece tarayıcıda görmek için kullanabilirsin)
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

// GERÇEK KULLANIM: Controller üzerinden veri çekip mail atan rota
Route::get('/send-pdf', [EmailController::class, 'sendPdfEmail']);

// TEST ROTASI: Hızlıca test yapmak için
Route::get('/test-mail', function () {
    try {
        // Örnek bir veri listesi oluşturuyoruz (Sarı çizginin gitmesi için veri paslıyoruz)
        $testData = collect([
            ['id' => 1, 'name' => 'Test Ürünü', 'price' => '100'],
            ['id' => 2, 'name' => 'Örnek Kayıt', 'price' => '250'],
        ]);

        // Artık PDFMail içine veri ($testData) bekliyor
        Mail::to('dberhodan@gmail.com')->send(new PDFMail($testData, 'Hızlı Test Raporu'));
        
        return "E-posta başarıyla gönderildi! Lütfen dberhodan@gmail.com adresini kontrol et.";
    } catch (\Exception $e) {
        return "Hata oluştu: " . $e->getMessage();
    }
});