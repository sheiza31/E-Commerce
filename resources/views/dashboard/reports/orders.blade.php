<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Tanggal: {{ $date }}</p>
    <table border="1" cellspacing="0" cellpadding="5">
    <thead>
    <th>No</th>
      <th>Username</th>
      <th>Products</th>
      <th>Price</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Tanggal Order</th>
                        </thead>
        @foreach($orders as $data)
                        <tbody>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{  $data->users->username}}</td>
                            <td>{{  $data->products->product_name}}</td>
                            <td>{{  $data->products->price}}</td>
                            <td>{{  $data->Jumlah }}</td>
                            <td>{{  $data->total_price}} </td>
                            <td>{{  $data->users->address }}</td>
                            <td>{{  $data->users->telp }}</td>
                            <td>{{  $data->created_at->format('d F Y')}}</td>
                        </tbody>
                        @endforeach
    </table>
</body>
</html>
