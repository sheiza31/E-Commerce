<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Message:</strong></p>
<p>{{ htmlspecialchars($messages) }}</p>  <!-- Menampilkan HTML tanpa mengubahnya -->


</body>
</html>