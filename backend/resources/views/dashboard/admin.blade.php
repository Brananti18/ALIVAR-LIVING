<h1>Dashboard Admin ALIVARE</h1>
<p>Selamat datang, Admin!</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>