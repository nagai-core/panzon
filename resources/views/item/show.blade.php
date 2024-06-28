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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    @vite('resources/css/app.css')
    @vite('resources/css/header.css')
    @vite('resources/css/show.css')
    <title>detail</title>
</head>
<body>
    <x-header />
    <main>
        <div class="item-container">
            <div class="info">
                <p class="name">{{ $item->item_name }}</p>
                <p>{{ $item->content }}</p>
                <p class="price">値段: {{ $item->price }} 円</p>

                @if($item->latestStock->amount)
                <form action="" method="post">
                    @csrf
                    <p>最大:{{$item->latestStock->amount}}</p>
                    <input type="number" name="amount" value="1" min="1" max="{{$item->latestStock->amount}}" />
                    <button type="submit" class="add-to-cart">カートに追加する</button>
                </form>
                @else
                <p>売り切れ</p>
                @endif
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($item->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ $image->url }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

    </main>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                loop: true, // ループする場合
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
</body>
</html>
