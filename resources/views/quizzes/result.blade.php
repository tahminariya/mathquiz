<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
</head>
<body>
    <h2>✅ Quiz Submitted Successfully!</h2>
    <p><strong>Your Score: {{ $score }}/10</strong></p>

    <a href="/">🏠 Go to Home</a> |
    <a href="/results?user_id={{ $user_id }}">📊 View Quiz History</a>
</body>
</html>
