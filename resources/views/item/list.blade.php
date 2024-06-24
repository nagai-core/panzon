@if(Auth::check())
<div class="item-container">
    <h1>商品一覧</h1>
    <!-- Search Box -->
    <form action="{{ route('item.list') }}" method="GET" class="search-form">
        <input type="text" name="search" placeholder="商品を検索する...">
        <button type="submit">検索</button>
    </form>
    <!-- Category Dropdown -->
    <div class="dropdown">
        <button onclick="toggleDropdown('categoryDropdown')" class="dropbtn">カテゴリ ▼</button>
        <div id="categoryDropdown" class="dropdown-content">
            <!-- All Categories Option -->
            <a href="{{ route('item.list') }}">全て</a>
            <!-- Display all categories -->
            @foreach ($categories as $category)
                <a href="{{ route('item.list', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
    
    <!-- Order Dropdown -->
    <div class="dropdown">
        <button onclick="toggleDropdown('orderDropdown')" class="dropbtn">並び替え ▼</button>
        <div id="orderDropdown" class="dropdown-content">
            <a href="{{ route('item.list', ['category_id' => request('category_id'), 'order' => 'price_asc']) }}">価格が安い順</a>
            <a href="{{ route('item.list', ['category_id' => request('category_id'), 'order' => 'price_desc']) }}">価格が高い順</a>
            <a href="{{ route('item.list', ['category_id' => request('category_id'), 'order' => 'date_desc']) }}">投稿日が新しい順</a>
            <a href="{{ route('item.list', ['category_id' => request('category_id'), 'order' => 'date_asc']) }}">投稿日が古い順</a>
        </div>
    </div>
    <div>
        <h2>現在のカテゴリ: {{ $selectedCategory }}</h2>
    </div>
    <!-- Display Items -->
    <div class="filtered-items">
        @foreach ($items as $item)
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
                <div class="purchase-button">
                    <a href="{{ route('item.purchase', ['item_id' => $item->id]) }}" class="btn btn-primary">購入する</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@else
<div class="alert alert-danger" role="alert">
    ログインしていません。ログインしてください。
</div>
@endif
<style>
    /* Dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
        margin-right: 10px; /* Adjust spacing between dropdowns */
    }
    /* Dropdown button style */
    .dropbtn {
        background-color: #f1f1f1;
        color: black;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        width: 120px; 
    }

    /* Dropdown content (hidden by default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        width: 320px;
        padding: 10px;
        overflow-y: auto;
        max-height: 200px; /* Adjust max height as needed */
        border-radius: 5px; /* Rounded corners */
        border: 1px solid #ddd; /* Border color */
        column-count: 2; /* Split items into two columns */
        column-gap: 20px; /* Adjust gap between columns */
    }

    /* Show dropdown content */
    .show {
        display: block;
    }

    /* Dropdown content items */
    .dropdown-content a {
        display: block;
        color: black;
        padding: 10px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    /* Dropdown content item hover */
    .dropdown-content a:hover {
        background-color: #f9f9f9; /* Light gray background on hover */
    }

</style>
<script>
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
