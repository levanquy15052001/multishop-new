<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bill</title>
    <style>
        @font-face {
        font-family: 'dejavu';
        font-weight: bold;
        src: url({{storage_path('fonts/dejavu-serif.bold.ttf')}}) format("truetype");
            }
    </style>
</head>
<body style="font-family: 'dejavu';">
    <h3 style="text-align: center"> Bill Order</h3>
    <table>
       <tr>
        <td>Name</td>
        <td>{{$Information['name']}}</td>
       </tr>
       <tr>
        <td>Phone</td>
        <td>{{$Information['phone']}}</td>
       </tr>
       <tr>
        <td>Address</td>
        <td>{{$Information['address']}} {{$Information['ward']}} {{$Information['district']}} {{$Information['city']}}</td>
       </tr>
    </table>
    <div class="order">
        <h2>Order Details</h2>
        <table style="width: 100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total</td>
            </tr>
            @for ($i = 0; $i < count($Information['order__p_d_f']); $i++)
                <tr>
                    <td>{{$Information['order__p_d_f'][$i]['product_name']}}</td>
                    <td>{{$Information['order__p_d_f'][$i]['price']}} $</td>
                    <td>{{$Information['order__p_d_f'][$i]['qty']}}</td>
                    <td>
                        {{$Information['order__p_d_f'][$i]['price'] * $Information['order__p_d_f'][$i]['qty'] }}$
                    </td>
                </tr>
            @endfor
            <tr><td colspan="4" style="text-align: center">Total Order: $ {{$total_order}}</td></tr>
        </table>
    </div>
</body>
</html>