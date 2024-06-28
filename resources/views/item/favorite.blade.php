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
                    <div class="container">
                        <h1>お気に入りアイテム</h1>
                        <div>
                            @foreach ($favorites as $item)
                                <div>
                                    @if ($item->is_variable)
                                        <div class="item">
                                            <h3>商品名：{{ $item->item_name }}</h3>
                                            <p>価格：{{ $item->price }}</p>
                                            <p>投稿日: {{ $item->created_at }}</p>
                                            <div class="content">
                                                <h4>内容 :</h4>
                                                <p>{{ $item->content }}</p>
                                            </div>
                                            <div class="images">
                                                @foreach ($item->images as $image)
                                                    <img src="{{ $image->url }}" style="width: 100px; height: 100px;">
                                                @endforeach
                                            </div>
                                            <form action="{{ route('favorite.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">お気に入りから削除</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
