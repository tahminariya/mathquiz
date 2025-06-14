{{-- ✅ Success/Error Flash Message --}}
@if(session('success'))
    <div style="color: green; margin-bottom: 20px;">
        ✅ {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div style="color: red; margin-bottom: 20px;">
        ⚠️ {{ session('error') }}
    </div>
@endif

{{-- Top Navigation --}}
<div style="margin-bottom: 15px; font-family:sans-serif;">
    @auth
        👋 Welcome, {{ Auth::user()->name }} |
        <a href="/logout">Logout</a>

        @if(Auth::user()->role === 'admin')
            | <a href="/admin/dashboard">Admin Panel</a>
        @endif
    @endauth
</div>
<hr>

{{-- Math Quiz Introduction --}}
<div style="padding: 20px; background-color: #f0f0f0; border-radius: 8px; margin-bottom: 30px;">
    <h1>🧮 Welcome to SmartMath Quiz System</h1>
    <p>
        This is an interactive online math quiz system designed to help students and job seekers improve their problem-solving skills in Algebra, Geometry, Trigonometry, and more.
    </p>
    <ul>
        <li>✔️ MCQ-based questions</li>
        <li>✔️ Instant score and result</li>
        <li>✔️ History tracking</li>
    </ul>

    {{-- For guests only --}}
    @guest
        <div style="margin-top: 20px;">
            <a href="/register"
               style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                🚀 Register Now to Start
            </a>

            <p style="margin-top: 10px;">
                🔓 Already registered?
                <a href="/login" style="color: #007bff;">Login here</a>
            </p>
        </div>
    @endguest
</div>

{{-- Quiz Form: Only visible if user is logged in --}}
@auth
    <h2>Start a Quiz</h2>

    <form method="GET" action="{{ route('quiz.show') }}">
        {{-- Let user manually type their ID --}}
        <label>Your ID:</label>
        <input type="number" name="user_id" placeholder="Enter your ID" required>

        <br><br>
        <label>Select Category:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->NAME ?? 'NO NAME FOUND' }}</option>
            @endforeach
        </select>

        <br><br>
        <button type="submit">Start Quiz</button>
    </form>
@endauth
