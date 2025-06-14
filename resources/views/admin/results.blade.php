<h1>📊 View User Results</h1>
<h2> All User Quiz Results</h2>
<table border="1" cellpadding="10">
    <tr><th>User ID</th><th>Category</th><th>Score</th><th>Date</th></tr>
    @foreach($results as $res)
        <tr>
            <td>{{ $res->user_id }}</td>
            <td>{{ $res->category->NAME ?? 'N/A' }}</td>
            <td>{{ $res->score }}/10</td>
            <td>{{ $res->created_at->format('d M Y, h:i A') }}</td>
        </tr>
    @endforeach
</table>
