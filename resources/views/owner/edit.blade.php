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
                        <h1>商品編集</h1>
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
                                        <option value="{{ $bread->category_id }}" {{ $bread->category_id === $category->id  ? " selected" : ""}}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">カテゴリー</label>
                                <input type="text" name="category_id" class="form-control" value="{{ $bread->category_id }}">
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

                            <button type="submit" class="btn btn-primary">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
