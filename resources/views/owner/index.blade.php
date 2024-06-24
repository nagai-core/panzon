<x-app-layout>
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
                                        @if($bread->is_variable)
                                            販売中
                                        @else
                                            販売停止
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
