<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }
        ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>🛠 Admin Dashboard</h1>

    <p>Welcome, <strong>{{ Auth::user()->name }}</strong>!</p>

    <ul>
        <li><a href="{{ url('/admin/categories') }}">📚 Manage Categories</a></li>
        <li><a href="{{ url('/admin/questions') }}">📝 Manage Questions</a></li>
        <li><a href="{{ url('/admin/results') }}">📊 View User Results</a></li>
    </ul>

    <br>
    <a href="/logout"> Logout</a>
</body>
</html>
