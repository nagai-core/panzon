<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS (if not already included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/css/header.css')
    @vite('resources/css/cart.css')
    <title>cart</title>
</head>
<body>
    <x-header />
    <main>

        @foreach($carts as $cart)
        <div class="cart">
            @foreach($cart->item->images as $image)
            <img src="{{ $image->url }}" alt="Item Image" width="100px">
            @endforeach
            <div class="info">
                <p>商品名: {{$cart->item->item_name}}</p>
                <p>値段: {{$cart->item->price}}</p>
                @if($cart->is_variable)
                <div class="amount">
                    @if($cart->amount != 1)
                    <form action="{{ route('cart.minusUpdate', ['cartId' => $cart->id]) }}" method="post">
                        @csrf
                        <button type="submit">-</button>
                    </form>
                    @else
                    <button type="button" disabled>-</button>
                    @endif
                    <p>{{ $cart->amount }}</p>
                    <form action="{{ route('cart.plusUpdate', ['cartId' => $cart->id]) }}" method="post">
                        @csrf
                        <button type="submit">+</button>
                    </form>
                </div>
                <form action="{{ route('cart.destroy', ['cartId' => $cart->id]) }}" method="post">
                    @csrf
                    <button type="submit">削除する</button>
                </form>
                @else
                <p class="sold-out">売り切れ</p>
                @endif
            </div>
        </div>
        @endforeach
        <form action="{{ route('checkout') }}" method="POST" class="money">
            @csrf
            @if ($carts ->isEmpty())
                <p>カートは空です。</p>
            @else
                <button type="submit">決済手続へ</button>
            @endif
        </form>
        <div class="back">
            <a href="{{route('item.list')}}">他の商品も見る</a>
        </div>

    </main>
</body>
</html>
