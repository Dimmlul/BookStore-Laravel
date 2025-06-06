<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Register</h2>

    @if ($errors->any())
        <div>{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/register">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>

        <label>No. Telepon:</label>
        <input type="text" name="no_telp" required><br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="/login">Login</a></p>
</body>

</html>
