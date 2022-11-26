<h1>This is dashboard page</h1>
<form id="logout-form" method="POST" action="{{ route('logout') }}"
    class="bg-white text-black p-2 fixed top-5 right-5 rounded" class="hidden">
    @csrf
    <button type="submit">Log Out</button>
</form>
