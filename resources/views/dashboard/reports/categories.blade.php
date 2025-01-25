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
    <table class = "table text-center">
                                <thead>
                                    <th>No</th>
                                    <th>Categories</th>
                                </thead>
                                      @foreach($categories as $data)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $data->name }}</td>
                                </tbody>
                                @endforeach
                            </table>
</body>
</html>
