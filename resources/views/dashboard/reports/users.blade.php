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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Alamat</th>
                                    <th>No Telpon</th>
                                </thead>
                                      @foreach($users as $data)
                                <tbody>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->password }}</td>
                                    <td>{{ $data->roles }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->telp }}</td>
                                </tbody>
                                @endforeach 
                            </table>
</body>
</html>
