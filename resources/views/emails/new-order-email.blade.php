<div class="container">
    <h1 class="fs-1">Grazie <span class="text-danger">{{ $order['name'] }}</span>!</h1>
    <p>Abbiamo appena ricevuto il tuo ordine, verrà inviato presso l'indirizzo {{ $order['address'] }}.</p>
    <p>Riepilogo ordine:</p>
    <table class="table table-success">
        <thead>
            <tr>
                <th>Prodotto</th>
                <th>Quantità</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($order['products'] as $index => $item)
                <tr>
                    <td>{{ $products[$index]['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Buon appetito!</p>
</div>
