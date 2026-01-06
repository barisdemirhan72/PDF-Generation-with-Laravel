<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        /* Türkçe karakter desteği için DejaVu Sans önemli */
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 20px; color: #000; }
        .info { margin-bottom: 15px; }
        
        /* Tablo Tasarımı */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        tr:nth-child(even) { background-color: #fafafa; }
        
        .footer { margin-top: 30px; text-align: right; font-style: italic; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">{{ $title }}</div>

    <div class="info">
        <p><strong>Rapor Tarihi:</strong> {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ürün/Kayıt Adı</th>
                <th>Fiyat/Değer</th>
            </tr>
        </thead>
        <tbody>
            {{-- Controller'dan gelen $items listesini döngüye sokuyoruz --}}
            @foreach($items as $item)
            <tr>
                {{-- Veriler dizi ise $item['id'], nesne ise $item->id şeklinde kullanılır --}}
                <td>{{ is_array($item) ? $item['id'] : $item->id }}</td>
                <td>{{ is_array($item) ? $item['name'] : $item->name }}</td>
                <td>{{ is_array($item) ? $item['price'] : $item->price }} TL</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Bu rapor otomatik olarak oluşturulmuştur.
    </div>
</body>
</html>