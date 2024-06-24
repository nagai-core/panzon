<body>
    <div class="container">
        <h1>商品登録</h1>
        <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                カテゴリー名：<select name="category_id" id="category_id" class="form-control" required>
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
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
                <label for="images">商品画像</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</body>

