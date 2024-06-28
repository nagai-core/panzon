<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/header.css')
    @vite('resources/css/index.css')
    @vite('resources/css/footer.css')
    @vite('resources/css/complete.css')
    <title>Document</title>
</head>
<body>
    <x-header />
    <main>
        <div>
            <p class="title">以下の商品の購入が完了しました</p>
            @foreach ($cartItems as $cart)
                <div class="wrapper">
                    <p>商品名：{{$cart->item->item_name}}</p>
                    <p>金額：{{$cart->item->price}}円</p>
                    <p>品数:{{$cart->amount}}</p>
                </div>
            @endforeach
            <p>合計：{{$count}}円</p>
            <p class="title">配送先</p>
            <p class="address">{{$address}}</p>
        </div>

    </main>
    <x-footer />
</body>
</html>
