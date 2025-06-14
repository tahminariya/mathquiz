<h2>📚 Manage Categories</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->NAME }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $cat->id) }}">✏️ Edit</a> |
                <form method="POST" action="{{ route('admin.categories.delete', $cat->id) }}" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure to delete this?')">🗑️ Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr><br>
<h3>➕ Add New Category</h3>
<form method="POST" action="{{ route('admin.categories.store') }}">
    @csrf
    <input type="text" name="NAME" placeholder="Category Name" required>
    <button type="submit">Add Category</button>
</form>
