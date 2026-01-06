<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;
// Hangi modelin listesini göndermek istiyorsan onu buraya ekle
// Örneğin: use App\Models\Product; 

class EmailController extends Controller
{
    public function sendPdfEmail()
    {
        // 1. Veritabanından verileri çek (Örnek: Product modeli kullanılmıştır)
        // Eğer henüz bir modelin yoksa şimdilik 'all()' yerine boş bir koleksiyon veya test verisi de gönderebilirsin.
        // $data = \App\Models\Product::all(); 
        
        // ŞİMDİLİK TEST İÇİN: Manuel bir veri listesi oluşturalım (CRUD hazır olduğunda yukarıdaki satırı kullanırsın)
        $data = collect([
            ['id' => 1, 'name' => 'Laptop', 'price' => '15000'],
            ['id' => 2, 'name' => 'Mouse', 'price' => '250'],
            ['id' => 3, 'name' => 'Klavye', 'price' => '500'],
        ]);

        // 2. E-postayı gönderirken veriyi ve başlığı parametre olarak veriyoruz
        // PDFMail.php'de __construct($dataList, $title) yapmıştık.
        Mail::to('dberhodan@gmail.com')->send(new PDFMail($data, 'Güncel Ürün Stok Raporu'));

        // 3. İşlemden sonra geri yönlendir
       return "E-mail has been set successfully with PDF attachment.";
    }
}