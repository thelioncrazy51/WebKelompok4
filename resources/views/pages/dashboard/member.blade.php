<!DOCTYPE html>
<html>
<head>
    <title>Member Dashboard</title>
</head>
<body>
    <h1>Welcome, Member!</h1>
    <p>Email: {{ session('user')->email }}</p>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>