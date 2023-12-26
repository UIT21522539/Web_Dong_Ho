<form method="POST" action="{{ route('admin.login2') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="text" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
