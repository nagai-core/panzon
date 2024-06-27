{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>商品登録</h1>
                        <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                カテゴリー名：<select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">選択してください</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="item_name">商品名</label>
                                <input type="text" name="item_name" id="item_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="price">価格</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="content">商品詳細</label>
                                <textarea name="content" id="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="amount">在庫数</label>
                                <input type="number" name="amount" id="amount" class="form-control" value="0"
                                    required>
                            </div>
                            <div class="form-group">
                            <label for="image">サムネイル</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="images">商品画像</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                        </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS (if not already included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @vite('resources/css/owner-components.css')
    @vite('resources/css/app.css')
    @vite('resources/css/owner-create.css')
    <title>category</title>
</head>
<body>
    <x-owner-header />
    <main>
        <div class="left-wrapper">
            <div class="owner">
                <img src="/storage/{{$owner->icon}}" alt="" />
                <p>{{$owner->username}}</p>
            </div>
            <nav>
                <div class="btn"><a href="{{route("owner.index")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m21.743 12.331-9-10c-.379-.422-1.107-.422-1.486 0l-9 10a.998.998 0 0 0-.17 1.076c.16.361.518.593.913.593h2v7a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-4h4v4a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-7h2a.998.998 0 0 0 .743-1.669z"></path></svg>home</a></div>
                <div class="btn"><a href="{{route("owner.category")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M3 2h2v20H3zm7 4h7v2h-7zm0 4h7v2h-7z"></path><path d="M19 2H6v20h13c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 18H8V4h11v16z"></path></svg>category</a></div>
                <div class="btn checked"><a href="{{route("owner.create")}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M7.64 21.71a8 8 0 0 0 5.6-2.47l6-6c2.87-2.87 3.31-7.11 1-9.45s-6.58-1.91-9.45 1l-6 6c-2.87 2.87-3.31 7.11-1 9.45a5.38 5.38 0 0 0 3.85 1.47zm-2-9 2.78 2.79 1.42-1.42-2.79-2.79 1.41-1.41 2.83 2.83 1.42-1.42-2.83-2.83 1.41-1.41 2.83 2.83 1.42-1.42-2.79-2.78c2-1.61 4.65-1.87 6-.47s1.09 4.56-1 6.62l-6 6c-2.06 2.05-5.09 2.5-6.62 1s-1.06-4.07.55-6.08z"></path></svg>Add a product</a></div>
                <div class="btn"><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>log out</a></div>
            </nav>
        </div>
        <div class="content-wrapper">
            <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    カテゴリー名：<select name="category_id" id="category_id" class="form-control" required>
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="item_name">商品名</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">商品詳細</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="amount">在庫数</label>
                    <input type="number" name="amount" id="amount" class="form-control" value="0"
                        required>
                </div>
                <div class="form-group">
                <label for="image">サムネイル</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="images">商品画像</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>
