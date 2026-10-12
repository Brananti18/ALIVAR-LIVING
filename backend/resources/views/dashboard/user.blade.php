<h1>Dashboard Penyewa ALIVARE</h1>
<p>Selamat datang, Penyewa!</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>