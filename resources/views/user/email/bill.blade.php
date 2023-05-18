<div style="width: 600px; margin:0 auto">
    <div style="text-align: center">
        <h3> Hóa Đơn Của Bạn</h3>
    </div>
<table>
    <tr>
        <td>Name:</td>
        <td>{{$Information['name']}}</td>
    </tr>
    <tr>
        <td>Address:</td>
        <td>{{$Information['address']}} {{$Information['ward']}} {{$Information['district']}} {{$Information['city']}}</td>
    </tr>
    <tr>
        <td>SDT:</td>
        <td>{{$Information['phone']}}</td>
    </tr>
</table>
<table style="width: 100%" border="1" cellspacing="0" cellpadding="10">
    <thead>
      <tr>
        <th>Name Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody  style="text-align: center">
     @for ($i = 0; $i < count( $Information['order']); $i++)
     <tr>
        <td> {{$Information['order'][$i]['product_name']}}</td>
        <td>$  {{$Information['order'][$i]['price']}}</td>
        <td> {{$Information['order'][$i]['qty']}}</td>
        <td>$ {{$Information['order'][$i]['price'] * $Information['order'][$i]['qty']}}</td>
      </tr>
     @endfor
     <tr>
        <td colspan="5" style="text-align: center"> Total Order: $ {{$total_order}} </td>
     </tr>

    </tbody>
  </table>
  <a href="{{route('pdf_bill',$Information['user_id'])}}" style="display: inline-block;background:green;color:#fff;padding:7px 25px;font-weight:bold;margin-top:10px">DownloadPDF</a>
</div>
