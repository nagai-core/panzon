<div class="history-container">
    <h1>購入履歴</h1>
    @if ($purchaseHistories->isEmpty())
        <p>No purchase histories found.</p>
    @else
        <ul>
            @php
                $id =1;
            @endphp
            @foreach ($purchaseHistories as $history)
                <li>
                    <strong>ID:</strong> {{ $id++ }} <br>
                    <strong>購入日:</strong> {{ $history->created_at }} <br>
                    <strong>購入情報:</strong>
                    <ul>
                        @foreach ($history->itemOrders as $itemOrder)
                            <li>
                                @if ($itemOrder->item && $itemOrder->item->images)
                                    @foreach ($itemOrder->item->images as $image)
                                        @if($image->is_variable)
                                        <img src="{{ $image->url }}"style="width: 100px; height: 100px;">
                                        @endif
                                    @endforeach
                                @endif<br>
                                <strong>商品名:</strong> {{ $itemOrder->item->item_name ?? null}} <br>
                                <strong>数量:</strong> {{ $itemOrder->amount ?? null}}
                            </li>
                        @endforeach

                    </ul>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>

