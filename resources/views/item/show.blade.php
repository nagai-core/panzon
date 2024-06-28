{{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h3>Item Name: {{ $item->item_name }}</h3>
            <p>Price: {{ $item->price }}</p>
            <p>Description: {{ $item->content }}</p>

            <h4>Latest Stock</h4>
            @if ($item->latestStock)
                <p>Amount: {{ $item->latestStock->amount }}</p>
            @else
                <p>No stock information available.</p>
            @endif

            <h4>Images</h4>
            @if ($item->images->isNotEmpty())
                @foreach ($item->images as $image)
                    <img src="{{ $image->url }}" alt="Image" style="max-width: 100px;">
                @endforeach
            @else
                <p>No images available.</p>
            @endif
        </div>
    </div>
    @if ($errors->any())
    <div class="mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="post">
        @csrf
        <input type="number" name="amount" min="1" />
        <button>追加</button>
    </form>
</div> --}}

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
        {{-- <div class="info">
            <p class="name">{{ $item->item_name }}</p>
            <p> {{ $item->content }}</p>
            <p class="price">
                値段:
                {{ $item->price }}
                円
            </p>

            <form action="" method="post">
                @csrf
                <p>最大:{{$item->latestStock->amount}}</p>
                <input type="number" name="amount" min="1" max="{{$item->latestStock->amount}}" />
                <button class="">カートに追加する</button>
            </form>
        </div>
        <div class="imgs">
            @foreach ($item->images as $image)
                <img src="{{ $image->url }}" alt="Image">
            @endforeach
        </div> --}}

        <div class="item-container">
            <div class="info">
                <p class="name">{{ $item->item_name }}</p>
                <p>{{ $item->content }}</p>
                <p class="price">値段: {{ $item->price }} 円</p>

                <form action="" method="post">
                    @csrf
                    <p>最大:{{$item->latestStock->amount}}</p>
                    <input type="number" name="amount" min="1" max="{{$item->latestStock->amount}}" />
                    <button type="submit" class="add-to-cart">カートに追加する</button>
                </form>
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
