<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Voucher - {{ $purchase->reference_no }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
            background: #fff;
            padding: 40px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #2c3e50;
        }
        .header p {
            margin: 5px 0 0;
            color: #7f8c8d;
        }
        .meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .meta-box h4 {
            margin: 0 0 5px;
            font-size: 16px;
            color: #2c3e50;
        }
        .meta-box p {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #f9f9f9;
            font-weight: bold;
            color: #2c3e50;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .total-row td {
            font-size: 16px;
            font-weight: bold;
            border-top: 2px solid #2c3e50;
            border-bottom: none;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        @media print {
            body { padding: 0; background: #fff; }
            .container { border: none; padding: 0; width: 100%; max-width: 100%; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="no-print" style="text-align: right; margin-bottom: 20px;">
            <button onclick="window.print()" style="padding: 10px 20px; background: #2c3e50; color: #fff; border: none; cursor: pointer; border-radius: 4px;">Print Voucher</button>
        </div>

        <div class="header">
            <h1>Purchase Voucher</h1>
            <p>Reference: {{ $purchase->reference_no }}</p>
        </div>

        <div class="meta">
            <div class="meta-box">
                <h4>Supplier Details</h4>
                <p><strong>{{ $purchase->supplier->name }}</strong></p>
                @if($purchase->supplier->address)<p>{{ $purchase->supplier->address }}</p>@endif
                @if($purchase->supplier->phone)<p>Phone: {{ $purchase->supplier->phone }}</p>@endif
            </div>
            <div class="meta-box text-right">
                <h4>Purchase Details</h4>
                <p>Date: {{ $purchase->purchase_date->format('F d, Y') }}</p>
                <p>Status: {{ ucfirst($purchase->status) }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Unit Cost</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase->items as $item)
                <tr>
                    <td>
                        @if($item->product) {{ $item->product->name }} (Product)
                        @elseif($item->ingredient) {{ $item->ingredient->name }} (Ingredient)
                        @endif
                    </td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">${{ number_format($item->unit_cost, 2) }}</td>
                    <td class="text-right">${{ number_format($item->subtotal, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="3" class="text-right">Grand Total</td>
                    <td class="text-right">${{ number_format($purchase->total_amount, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        @if($purchase->notes)
        <div style="margin-top: 20px; padding: 15px; background: #f9f9f9; border-radius: 4px;">
            <strong>Notes:</strong> {{ $purchase->notes }}
        </div>
        @endif

        <div class="footer">
            <p>Authorized Signature __________________________</p>
            <p>Generated on {{ date('F d, Y H:i A') }}</p>
        </div>
    </div>
</body>
</html>
