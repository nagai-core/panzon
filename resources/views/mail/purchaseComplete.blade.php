@php
    $total =0;
@endphp
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>決済完了のお知らせ</title>
</head>
<body>
    <div class="purchase-mail-container">
        <h1>決済完了のお知らせ</h1>
        <div class="content">
            <h2>送信先:</h2>
            <p>{{$address}}</p>
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">商品名</th>
                        <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">価格</th>
                        <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">数量</th>
                        <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">小計</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                        @php
                            $subtotal = $cartItem['item']['price'] * $cartItem['amount'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td style="padding: 8px; border: 1px solid #ddd;">{{ $cartItem['item']['item_name'] }}</td>
                            <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($cartItem['item']['price']) }}</td>
                            <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">{{ $cartItem['amount'] }}</td>
                            <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($cartItem['item']['price'] * $cartItem['amount']) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="padding: 8px; text-align: right; border: 1px solid #ddd;">合計</td>
                        <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


