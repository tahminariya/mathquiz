<h2>📝 All Questions</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Question</th>
        <th>Options</th>
        <th>Correct</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    @foreach($questions as $q)
        <tr>
            <td>{{ $q->id }}</td>
            <td>{{ $q->question }}</td>
            <td>
                1. {{ $q->option1 }}<br>
                2. {{ $q->option2 }}<br>
                3. {{ $q->option3 }}<br>
                4. {{ $q->option4 }}
            </td>
            <td>{{ $q->correct_option }}</td>
            <td>{{ $q->category_id }}</td>
            <td>
                <a href="{{ route('admin.questions.edit', $q->id) }}">✏️ Edit</a> |
                <form method="POST" action="{{ route('admin.questions.delete', $q->id) }}" style="display:inline">
                    @csrf
                    <button type="submit" onclick="return confirm('Delete this question?')">🗑️ Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<hr><br>
<h3>➕ Add New Question</h3>

<form method="POST" action="{{ route('admin.questions.store') }}">
    @csrf
    <input type="text" name="question" placeholder="Question" required><br>
    <input type="text" name="option1" placeholder="Option 1" required><br>
    <input type="text" name="option2" placeholder="Option 2" required><br>
    <input type="text" name="option3" placeholder="Option 3" required><br>
    <input type="text" name="option4" placeholder="Option 4" required><br>
    <input type="text" name="correct_option" placeholder="Correct Option (e.g., option1)" required><br>

    <label>Select Category:</label>
    <select name="category_id" required>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->NAME }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Add Question</button>
</form>
