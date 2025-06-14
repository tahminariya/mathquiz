<h2>✏️ Edit Category</h2>

<form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
    @csrf
    <input type="text" name="NAME" value="{{ $category->NAME }}" required>
    <button type="submit">💾 Update</button>
</form>

<br>
<a href="{{ route('admin.categories') }}">⬅️ Back to Categories</a>
