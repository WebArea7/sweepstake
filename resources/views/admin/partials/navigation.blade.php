<aside class="w-full md:h-screen md:w-64 bg-gray-900 md:flex md:flex-col">
    <header class="border-b border-solid border-gray-800 flex-grow">
        <h1 class="py-6 px-4 text-gray-100 text-base font-medium"><a href="{{ route('home') }}" target="_blank">Website admin</a></h1>
    </header>
    <nav class="overflow-y-auto h-full flex-grow mt-3">
        <ul class="font-medium px-4 text-left">
            <li class="text-gray-100">
                <a href="{{ route('admin.dashboard') }}"
                   class="rounded text-sm text-left block py-3 px-6 w-full {{ (Route::currentRouteName() == 'admin.dashboard') ? 'bg-violet-500' : 'hover:text-gray-400' }}">Dashboard</a>
                <a href="{{ route('admin.users') }}" class="rounded text-sm text-left block py-3 px-6 w-full {{ (Route::currentRouteName() == 'admin.users' || Route::currentRouteName() == 'admin.users.show') ? 'bg-violet-500' : 'hover:text-gray-400' }}">Admin Users</a>
                <a href="{{ route('admin.customers') }}" class="rounded text-sm block py-3 px-6 hover:text-gray-400 w-full text-left {{ (Route::currentRouteName() == 'admin.customers' || Route::currentRouteName() == 'admin.customers.show') ? 'bg-violet-500' : 'hover:text-gray-400' }}">Customers</a>
            </li>
        </ul>
    </nav>
    <section id="user" class="p-4 border-t border-solid border-gray-800">
        <div class="flex flex-col p-2">
            <span class="text-white pb-1">{{ auth()->user()->name }}</span>
            <span class="text-xs text-gray-500">{{ auth()->user()->email }}</span>
        </div>

        <form action="{{ route('logout') }}" method="post" class="p-2">
            @csrf
            <button type="submit" class="text-sm text-white underline pb-1 cursor-pointer">Logout</button>
        </form>
    </section>

    <footer class="p-4 border-t border-solid border-gray-800">
        <h4 class="pb-2 text-gray-100 text-sm">© Syndicode</h4>
    </footer>
</aside>
