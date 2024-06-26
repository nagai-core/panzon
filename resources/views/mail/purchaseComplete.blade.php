@php
$purchasedItems = [
    ['name' => '商品A', 'price' => 1000, 'amount' => 2],
    ['name' => '商品B', 'price' => 1500, 'amount' => 1],
];
$total = 0;
@endphp


<div class="purchase-mail-container">
    <h1>決済完了致しました。</h1>
    <div class="content">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">商品名</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">価格</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">数量</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">小計</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchasedItems as $item)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $item['name'] }}</td>
                    <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($item['price']) }}</td>
                    <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">{{ $item['amount'] }}</td>
                    <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($item['price'] * $item['amount']) }}</td>
                </tr>
                <?php $total += $item['price'] * $item['amount']; ?>
                @endforeach
                <tr>
                    <td colspan="3" style="padding: 8px; text-align: right; border: 1px solid #ddd;">合計</td>
                    <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">¥{{ number_format($total) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>