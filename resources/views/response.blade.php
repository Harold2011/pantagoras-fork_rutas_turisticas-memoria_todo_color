<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Response</title>
</head>
<body>
    <div class="container">
        <h1>Payment Status: {{ $estadoTx }}</h1>
        <h3>Transaction Details:</h3>
        <ul>
            <li><strong>ApiKey:</strong> {{ $data['ApiKey'] }}</li>
            <li><strong>Merchant Id:</strong> {{ $data['merchant_id'] }}</li>
            <li><strong>Reference Code:</strong> {{ $data['referenceCode'] }}</li>
            <li><strong>Transaction Value:</strong> {{ $data['TX_VALUE'] }}</li>
            <li><strong>Currency:</strong> {{ $data['currency'] }}</li>
            <li><strong>Transaction State:</strong> {{ $data['transactionState'] }}</li>
        </ul>
        <p>
            <a href="{{ route('viewCart') }}">Go back to cart</a>
        </p>
    </div>
</body>
</html>
