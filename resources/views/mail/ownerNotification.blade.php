<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入のお知らせ</title>
</head>
<body>
    <div>
        <h2>購入のお知らせ</h2>
        <p>以下の商品が購入されました。</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th style="padding: 8px; text-align: left; border: 1px solid #ddd;">商品名</th>
                    <th style="padding: 8px; text-align: center; border: 1px solid #ddd;">数量</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $item->item_name }}</td>
                    <td style="padding: 8px; text-align: center; border: 1px solid #ddd;">{{ $amount }}</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</body>
</html>
