<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="account">Account:</label>
    <input type="text" name="account" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>