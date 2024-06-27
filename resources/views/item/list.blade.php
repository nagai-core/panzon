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
    @vite('resources/css/list.css')
    <title>list</title>
</head>
<body>
    <x-header />
    <main>
        <nav>
            <p data-toggle="modal" data-target="#categoryModal">category</p>
            <p data-toggle="modal" data-target="#orderModal">order</p>
        </nav>

        <div class="main-wrapper">
            @foreach ($items as $item)
                <div class="content">
                    <div class="images">
                        @foreach ($item->images as $image)
                            @if($image->is_variable)
                            <img src="{{ $image->url }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="info">
                        <p>{{ $item->item_name }}</p>
                        <p class="price">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M17.2 3.4 12 10.333 6.8 3.4 5.2 4.6 10 11H7v2h4v2H7v2h4v4h2v-4h4v-2h-4v-2h4v-2h-3l4.8-6.4z"></path></svg>
                            {{ $item->price }}
                        </p>
                        <a href="{{ route('item.show', ['itemId' => $item->id]) }}" class="purchase-button">
                            <p>詳細へ</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                        </a>
                        <div class="favorite-button">
                            @if (in_array($item->id, $favorites))
                                <form action="{{ route('favorite.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="selected" class=""  viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="m11.13 4.41 4.23 4.23L14.3 9.7l-4.24-4.24-1.77 1.77 4.24 4.24-1.06 1.06-4.24-4.24-1.77 1.77L9.7 14.3l-1.06 1.06-4.23-4.23C1.86 14 1.55 18 3.79 20.21a5.38 5.38 0 0 0 3.85 1.5 8 8 0 0 0 5.6-2.47l6-6c2.87-2.87 3.31-7.11 1-9.45s-6.24-1.93-9.11.62z"></path></svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('favorite.store', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M7.64 21.71a8 8 0 0 0 5.6-2.47l6-6c2.87-2.87 3.31-7.11 1-9.45s-6.58-1.91-9.45 1l-6 6c-2.87 2.87-3.31 7.11-1 9.45a5.38 5.38 0 0 0 3.85 1.47zm-2-9 2.78 2.79 1.42-1.42-2.79-2.79 1.41-1.41 2.83 2.83 1.42-1.42-2.83-2.83 1.41-1.41 2.83 2.83 1.42-1.42-2.79-2.78c2-1.61 4.65-1.87 6-.47s1.09 4.56-1 6.62l-6 6c-2.06 2.05-5.09 2.5-6.62 1s-1.06-4.07.55-6.08z"></path></svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">カテゴリ一覧</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- モーダル内のカテゴリリンク -->
                        <div id="modalCategoryLinks" class="modalW">
                            <a class="modalBtn" href="{{ route('item.list', ['search' => request('search')]) }}">全て</a>
                            <!-- Display all categories -->
                            @foreach ($categories as $category)
                                <a class="modalBtn" href="{{ route('item.list', ['search' => request('search'), 'category_id' => $category->id]) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="orderModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel">order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- モーダル内のカテゴリリンク -->
                        <div id="modalorderLinks" class="modalOrder">
                            <a class="modalOrderBtn" href="{{ route('item.list', ['search' => request('search')]) }}">全て</a>
                            <!-- Display all categories -->
                            <a class="modalOrderBtn" href="{{ route('item.list', ['search' => request('search'), 'category_id' => request('category_id'), 'order' => 'price_asc']) }}">価格が安い順</a>
                            <a class="modalOrderBtn" href="{{ route('item.list', ['search' => request('search'), 'category_id' => request('category_id'), 'order' => 'price_desc']) }}">価格が高い順</a>
                            <a class="modalOrderBtn" href="{{ route('item.list', ['search' => request('search'), 'category_id' => request('category_id'), 'order' => 'date_desc']) }}">投稿日が新しい順</a>
                            <a class="modalOrderBtn" href="{{ route('item.list', ['search' => request('search'), 'category_id' => request('category_id'), 'order' => 'date_asc']) }}">投稿日が古い順</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
