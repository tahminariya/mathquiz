<h2>✏️ Edit Question</h2>

<form method="POST" action="{{ route('admin.questions.update', $question->id) }}">
    @csrf
    <input type="text" name="question" value="{{ $question->question }}" required><br>
    <input type="text" name="option1" value="{{ $question->option1 }}" required><br>
    <input type="text" name="option2" value="{{ $question->option2 }}" required><br>
    <input type="text" name="option3" value="{{ $question->option3 }}" required><br>
    <input type="text" name="option4" value="{{ $question->option4 }}" required><br>
    <input type="text" name="correct_option" value="{{ $question->correct_option }}" required><br>

    <label>Select Category:</label>
    <select name="category_id" required>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @if($cat->id == $question->category_id) selected @endif>{{ $cat->NAME }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">💾 Update</button>
</form>

<br>
<a href="{{ route('admin.questions') }}">⬅ Back</a>
