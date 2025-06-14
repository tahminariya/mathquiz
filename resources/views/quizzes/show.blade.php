<h2>📋 Quiz</h2>

<form method="POST" action="{{ route('quiz.submit') }}">
    @csrf

    {{-- ✅ Hidden Inputs --}}
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="hidden" name="category_id" value="{{ $category_id }}">

    {{-- ✅ Loop Through Questions with Serial Number --}}
    @foreach($questions as $index => $q)
        <div style="margin-bottom: 20px;">
            <p><strong>Q{{ $index + 1 }}.</strong> {{ $q->question }}</p>

            @for($i = 1; $i <= 4; $i++)
                <label>
                    <input type="radio" name="answers[{{ $q->id }}]" value="option{{ $i }}" required>
                    {{ $q['option'.$i] }}
                </label><br>
            @endfor
        </div>
    @endforeach

    <br>
    <button type="submit"> Submit </button>
</form>
