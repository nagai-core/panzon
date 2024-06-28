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
    @vite('resources/css/owner-index.css')
    <title>index</title>
</head>
<body>
    <x-owner-header />
    <main>
        <x-owner-nav  :ownerName="$owner->username" :url="$owner->icon"/>
        <div class="content-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>image</th>
                        <th>name</th>
                        <th>category</th>
                        <th>price</th>
                        <th>amount</th>
                        <th>edit</th>
                        <th>stock</th>
                        <th>status</th>
                        <th>status btn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($breads as $bread)
                    <tr>
                        <td>{{ $bread->id }}</td>
                        <td>
                            @foreach ($bread->variableImages as $image)
                                <img src="{{ $image->url }}" style="width: 100px;">
                            @endforeach
                        </td>
                        <td>{{ $bread->item_name }}</td>
                        <td>{{ $bread->category->name }}</td>
                        <td>{{ $bread->price }}</td>
                        <td>{{ $bread->latestStock->amount }}</td>
                        <td>
                            {{-- <a href="{{ route('owner.edit', $bread->id) }}" class="btn btn-secondary">編集</a> --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editBreadModal_{{ $bread->id }}">
                                編集
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editStockModal_{{ $bread->id }}"
                                data-bread-id="{{ $bread->id }}" data-stock-amount="{{ $bread->latestStock->amount }}">
                                在庫数を変更
                            </button>
                        </td>
                        <td class="status">
                            @if($bread->is_variable)
                            <div class="launch">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M9.999 13.587 7.7 11.292l-1.412 1.416 3.713 3.705 6.706-6.706-1.414-1.414z"></path></svg>
                                販売中
                            </div>
                            @else
                                <div class="stoppage">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    販売停止
                                </div>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('owner.status', $bread->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @if($bread->is_variable)
                                <button type="submit" class="statusBtn stoppage">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    停止する
                                </button>
                                @else
                                <button type="submit" class="statusBtn launch">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M9.999 13.587 7.7 11.292l-1.412 1.416 3.713 3.705 6.706-6.706-1.414-1.414z"></path></svg>
                                    販売する
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    {{-- <tr class="dummy"></tr> --}}
                    @endforeach
                </tbody>
            </table>
        </div>
        @foreach ($breads as $bread)
        <div class="modal fade aiueo"  id="editStockModal_{{ $bread->id }}" tabindex="10000" role="dialog" aria-labelledby="editStockModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStockModalLabel">在庫編集</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editStockForm_{{ $bread->id }}" action="{{ route('owner.stockUpdate') }}" method="POST">
                            @csrf
                            <div class="modal-body" >
                                <form id="editStockForm_{{ $bread->id }}" action="{{ route('owner.stockUpdate') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="stock_quantity">現在の在庫数：{{ $bread->latestStock->amount }}</label>
                                        <input type="text" class="form-control" id="stock_quantity_{{ $bread->id }}" name="stock_quantity" value="{{ $bread->latestStock->amount }}">
                                    </div>
                                    <!-- Hidden input field for bread_id -->
                                    <input type="hidden" id="bread_id_input_{{ $bread->id }}" name="bread_id" value="{{ $bread->id }}">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">保存</button>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editBreadModal_{{ $bread->id }}" tabindex="-1" role="dialog" aria-labelledby="editBreadModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBreadModalLabel">編集</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- フォーム -->
                        <form method="POST" action="{{ route('owner.update', $bread->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="item_name">商品名</label>
                                <input type="text" name="item_name" class="form-control" value="{{ $bread->item_name }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">カテゴリー</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">選択してください</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $bread->category_id === $category->id  ? "selected" : "" }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">値段</label>
                                <input type="number" name="price" class="form-control" value="{{ $bread->price }}">
                            </div>
                            <div class="form-group">
                                <label for="content">説明</label>
                                <textarea name="content" class="form-control">{{ $bread->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="is_variable">ステータス</label>
                                <div>
                                    <label>
                                        <input type="radio" name="is_variable" value="1" {{ $bread->is_variable ? 'checked' : '' }}>
                                        販売中
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input type="radio" name="is_variable" value="0"  {{ !$bread->is_variable ? 'checked' : '' }}>
                                        販売停止中
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">サムネイル</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($bread->images()->where('is_variable', true)->exists())
                                    <div>
                                        <img src="{{ $bread->images()->where('is_variable', true)->first()->url }}" style="width: 100px;">
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="images">商品画像</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                @foreach ($bread->images()->where('is_variable', false)->get() as $image)
                                    <div>
                                        <img src="{{ $image->url }}" style="width: 100px;">
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </main>
</body>
</html>

