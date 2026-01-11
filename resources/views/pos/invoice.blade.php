<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        .divider {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .item-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .item-name {
            flex-grow: 1;
        }
        .item-price {
            text-align: right;
            min-width: 60px;
        }
        .totals {
            margin-top: 10px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }
        @media print {
            body {
                width: 100%;
                margin: 0;
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
        .btn-print {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>COFFEE SHOP</h1>
        <p>123 Coffee Street, City</p>
        <p>Tel: +123 456 7890</p>
        <div class="divider"></div>
        <p>Date: {{ $order->created_at->format('Y-m-d H:i') }}</p>
        <p>Order #: {{ $order->id }}</p>
        <p>Cashier: {{ $order->user->name ?? 'Guest' }}</p>
    </div>

    <div class="divider"></div>

    <div class="items">
        @foreach($order->items as $item)
        <div class="item-row">
            <span class="item-name">{{ $item->product->name }} (x{{ $item->quantity }})</span>
            <span class="item-price">{{ number_format($item->price * $item->quantity, 2) }}</span>
        </div>
        @endforeach
    </div>

    <div class="divider"></div>

    <div class="totals">
        <div class="item-row">
            <span>Subtotal</span>
            <span>{{ number_format($order->total_amount, 2) }}</span>
        </div>
        <!-- Tax and Discount hooks here -->
        <div class="total-row">
            <span>TOTAL</span>
            <span>{{ number_format($order->total_amount, 2) }}</span>
        </div>
    </div>

    <div class="divider"></div>

    <div class="footer">
        <p>Payment: {{ ucfirst($order->payments->first()->payment_method ?? 'Cash') }}</p>
        <p>Thank you for your visit!</p>
    </div>

    <a href="#" class="btn-print no-print" onclick="window.print()">Print Receipt</a>

    <script>
        window.onload = function() {
            // Auto print if needed
            // window.print();
        }
    </script>
</body>
</html>
