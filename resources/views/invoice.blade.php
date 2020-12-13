<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Purchase Invoice</title>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        width: auto;
        font-size: 12px;
        border: 1px solid #000000;
        /*border: none;*/
        text-align: center;
        padding-top: 4px;
        padding-bottom:  5px;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    input {
        border: none;
    }
    textarea {
        border: none;
  }
  </style>
</head>
<body>
        <h1 style="text-align: right;">Invoice</h1>
        <h3 style="text-align: right;"># {{$order->order_no}} </h3>
        <h3 style="text-align: right;">Order Date: {{date('d-M-Y', strtotime($order->created_at))}}</h3>

  <table style="margin-top: 15px; margin-bottom: 25px; float: center;">
    <thead>
      <tr>
        <th>#</th>
        <th>Products</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    @foreach($order->orderItems as $ord)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $ord->proName->name }}</td>
        <td>{{ $ord->count }}</td>
        <td>{{ $ord->unit_price}}</td>
        <td>{{ $ord->sub_price }}</td>
      </tr>
    @endforeach
        
    </tbody>
  </table>
      <h4 style="text-align: right; margin-right: 70px; margin-top: 80px">Shipping Amount : {{$order->shipping_charge}}</h4> 
      <h4 style="text-align: right; margin-right: 70px;">Net Total Amount : {{$order->total_price}}</h4>>
</body>
</html>