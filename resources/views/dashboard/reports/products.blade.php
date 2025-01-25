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
    <table border = 1 class = "table text-center">
                                <thead>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Categories</th>
                                </thead>
                                      @foreach($products as $data)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>{{Str::limit( $data->description,50) }}</td>
                                    <td>{{$data->image}}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->stock }}</td>
                                    <td>{{ $data->Categories->name }}</td>
                                </tbody>
                                @endforeach
                            </table>
</body>
</html>
