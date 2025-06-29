<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <p>Email: {{ session('user')->email }}</p>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>