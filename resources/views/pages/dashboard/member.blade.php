<!DOCTYPE html>
<html>
<head>
    <title>Member Dashboard</title>
</head>
<body>
    <h1>Welcome, Member!</h1>
    @auth
    <p>Email: {{ Auth::user()->email }}</p>
    @else
    <a href="{{ route('logout') }}">Logout</a>
    @endauth
</body>
</html>
