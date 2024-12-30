<!-- drawer init and toggle -->
<div class="text-left lg:hidden">
    <button
        class="text-slate-500  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
        type="button" data-drawer-target="drawer-disabled-backdrop" data-drawer-show="drawer-disabled-backdrop"
        data-drawer-backdrop="false" aria-controls="drawer-disabled-backdrop">
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
</div>

<!-- drawer component -->
<div id="drawer-disabled-backdrop"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-64 lg:translate-x-0 lg:block"
    tabindex="-1" aria-labelledby="drawer-disabled-backdrop-label">
    <h5 id="drawer-disabled-backdrop-label" class="text-base font-semibold pl-1 text-blue-500 ">
        Welcome, <a href="{{ route('beranda') }}" class="block uppercase text-xl font-bold">{{ auth()->user()->name }}</a>
    </h5>

    <!-- Remove the close button for lg size screens -->
    <div class="lg:hidden">
        <button type="button" data-drawer-hide="drawer-disabled-backdrop" aria-controls="drawer-disabled-backdrop"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center">
            <svg class="block lg:hidden w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium ">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex justify-start items-center p-2 text-black rounded-lg group {{ request()->is('dashboard') ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->is('dashboard') ? 'text-white fill-white' : 'text-black group-hover:text-white group-hover:fill-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"
                    class="flex justify-start items-center p-2 text-black rounded-lg group {{ request()->is('users*') ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->is('users*') ? 'text-white fill-white' : 'text-black group-hover:text-white group-hover:fill-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <!-- Landing Page -->
            <li>
                <a href="{{ route('konten.index') }}"
                    class="flex justify-start items-center p-2 text-black rounded-lg group {{ request()->is('konten*') ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->is('konten*') ? 'text-white fill-white' : 'text-black group-hover:text-white group-hover:fill-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span class="flex ms-3 whitespace-nowrap">Landing Page</span>
                </a>
            </li>
            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <li>
                    <button type="submit"
                        class="flex justify-start items-center p-2 text-black rounded-lg hover:bg-blue-500 hover:text-white group w-full"
                        onclick="return confirm('Anda Yakin Keluar?')">
                        <svg class="w-5 h-5 transition duration-75 {{ request()->is('logout') ? 'text-white fill-white' : 'text-black group-hover:text-white group-hover:fill-white' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h5v9H15" />
                        </svg>
                        <span class="flex ms-3 whitespace-nowrap">Logout</span>
                    </button>
                </li>
            </form>
        </ul>
    </div>
</div>
