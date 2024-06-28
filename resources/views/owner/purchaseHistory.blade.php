
<div class="container mt-4">
    <h1>購入履歴</h1>

    @if ($purchaseHistories->isEmpty())
        <p>No purchase histories found.</p>
    @else
        <ul class="list-unstyled">
            @php
                $id = 1;
            @endphp
            @foreach ($purchaseHistories->sortBy('id') as $history)
                <li class="mb-4">
                    <strong>ID:</strong> {{ $id++}} <br>
                    <strong>購入日:</strong> {{ $history->created_at->format('Y/m/d H:i:s') }} <br>
                    <strong>購入情報:</strong>
                    <ul class="list-unstyled">
                        @foreach ($history->itemOrders as $itemOrder)
                            @if (($itemOrder->item->owner_id??null) == Auth::id())

                                <li>
                                    @if ($itemOrder->item && $itemOrder->item->images)
                                        @foreach ($itemOrder->item->images as $image)
                                            @if($image->is_variable)
                                            <img src="{{ $image->url }}"style="width: 100px; height: 100px;">
                                            @endif
                                        @endforeach
                                    @endif<br>
                                    <strong>アイテム名:</strong> {{ $itemOrder->item->item_name ?? 'Unknown' }} <br>
                                    <strong>数量:</strong> {{ $itemOrder->amount ?? 'Unknown' }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>


