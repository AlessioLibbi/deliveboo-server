<p>Grazie {{ $order['name'] }}</p>
<p>Abbiamo appena ricevuto il tuo ordine, verrà inviato il prima possibile presso l'indirizzo {{ $order['address'] }}
</p>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
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
