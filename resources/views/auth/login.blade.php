@if(session('error'))<div style="color:red">{{ session('error') }}</div>@endif
@if(session('success'))<div style="color:green">{{ session('success') }}</div>@endif

<form method="POST" action="/login">
  @csrf
  <input name="email" type="email" placeholder="Email" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
