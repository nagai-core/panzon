<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
</div>
