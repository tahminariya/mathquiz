<h2>Quiz History for User ID: {{ $user_id }}</h2>

@if(count($results) > 0)
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Category</th>
            <th>Score</th>
            <th>Submitted At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->category->NAME ?? 'NO NAME FOUND'}}</td>
                <td>{{ $result->score }}/10</td>
                <td>{{ \Carbon\Carbon::parse($result->created_at)->format('d M Y, h:i A') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No quiz results found for this user.</p>
@endif

<br>
<a href="/">⬅ Back to Home</a>
