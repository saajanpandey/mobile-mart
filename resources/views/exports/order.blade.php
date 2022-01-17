<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table aria-describedby="productCategory export">
        <thead>
            <tr>
                @foreach($titles as $key=>$title)
                <th><strong>{{$title}}</strong></th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($order as $key=>$item)
            <tr>
                <td>{{ $item['customerName'] ?? ''}}</td>
                <td>{{ $item['address'] ?? ''}}</td>
                <td>{{ $item['mobileNumber']??''}}</td>
                <td>{{ $item['products']??''}}</td>
                <td>{{ $item['totalPrice']??''}}</td>
                <td>{{ $item['orderDate']??''}}</td>
                <td>{{ $item['paymentMethod']??''}}</td>
                <td>{{ $item['orderStatus']??''}}</td>
                <td>{{ $item['deliveryDate']??''}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
