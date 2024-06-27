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
                                <strong>Item Name:</strong> {{ $itemOrder->item->item_name ?? null}} <br>
                                <strong>Amount:</strong> {{ $itemOrder->amount ?? null}}
                            </li>
                        @endforeach

                    </ul>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>

