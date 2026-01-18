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
        @if($order->customer_name)
        <p>Customer: {{ $order->customer_name }}</p>
        @endif
        @if($order->table_id)
        <p>Table: {{ $order->table->name ?? 'Table' }}</p>
        @endif
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

@php
        $grossTotal = $order->items->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        $discount = $order->discount_amount ?? 0;
        
        // Assuming Tax is included in the stored total_amount
        // And total_amount = (Gross - Discount)
        // Wait, normally total_amount IS the final amount.
        // Let's rely on stored total_amount.
        
        $finalTotal = $order->total_amount;
        
        // Back-calculate Tax
        $taxRate = config('app.tax_rate', 10);
        $taxAmount = $finalTotal - ($finalTotal / (1 + ($taxRate / 100)));
        $netTotal = $finalTotal - $taxAmount;
@endphp
    <div class="totals">
        <div class="item-row">
            <span>Subtotal</span>
            <span>{{ number_format($grossTotal, 2) }}</span>
        </div>
        @if($discount > 0)
        <div class="item-row">
            <span>Discount</span>
            <span>-{{ number_format($discount, 2) }}</span>
        </div>
        @endif
        <div class="item-row">
            <span>Tax ({{ $taxRate }}%)</span>
            <span>{{ number_format($taxAmount, 2) }}</span>
        </div>
        <div class="divider"></div>
        <div class="total-row">
            <span>TOTAL</span>
            <span>{{ number_format($finalTotal, 2) }}</span>
        </div>
        
        @if($order->notes)
        <div class="divider"></div>
        <p style="font-size: 12px; font-style: italic;">Note: {{ $order->notes }}</p>
        @endif

        <div class="divider"></div>
        
        @php
            $payment = $order->payments->first();
            $paidAmount = $payment ? ($payment->tendered_amount ?? $payment->amount) : $finalTotal;
            $change = max(0, $paidAmount - $finalTotal);
        @endphp
        
        <div class="item-row">
            <span>Paid Amount</span>
            <span>{{ number_format($paidAmount, 2) }}</span>
        </div>
        <div class="item-row">
            <span>Change</span>
            <span>{{ number_format($change, 2) }}</span>
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
