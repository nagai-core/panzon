<x-app-layout>
    <!-- Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery (if not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS (if not already included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('owner.index') }}">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="検索キーワードを入力" value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">検索</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>image</th>
                                <th>商品名</th>
                                <th>カテゴリー</th>
                                <th>値段</th>
                                <th>説明</th>
                                <th>販売数</th>
                                <th>編集</th>
                                <th>在庫</th>
                                <th>ステータス</th>
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
                                    <td>{{ $bread->content }}</td>
                                    <td>{{ $bread->latestStock->amount }}</td>
                                    <td>
                                    </td>
                                    <td>

                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStockModal_{{ $bread->id }}"
                                            data-bread-id="{{ $bread->id }}" data-stock-amount="{{ $bread->latestStock->amount }}">
                                            在庫
                                        </button>


                                    </td>
                                    <td>
                                        @if($bread->is_variable)
                                            販売中
                                        @else
                                            販売停止
                                        @endif
                                    </td>
                                    <!-- Modal for each bread item -->
                                <div class="modal fade" id="editStockModal_{{ $bread->id }}" tabindex="-1" role="dialog" aria-labelledby="editStockModalLabel" aria-hidden="true">
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
                                                    <div class="modal-body">
                                                        <form id="editStockForm_{{ $bread->id }}" action="{{ route('owner.stockUpdate') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="stock_quantity">在庫数：</label>
                                                                <p>min:0 max:1000</p>
                                                                <input type="text" class="form-control" id="stock_quantity_{{ $bread->id }}" name="stock_quantity" value="{{ $bread->latestStock->amount }}">
                                                            </div>
                                                            <!-- Hidden input field for bread_id -->
                                                            <input type="hidden" id="bread_id_input_{{ $bread->id }}" name="bread_id" value="{{ $bread->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                                                <button type="submit" class="btn btn-primary">保存</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
