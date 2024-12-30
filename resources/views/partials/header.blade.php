<nav id="navbar" class="bg-white fixed top-0 w-full z-50 border-b border-gray-200 opacity-100">

    <div class="px-5 flex  items-center justify-between mx-auto py-1 font-lexend font-extrabold">

        <a href="#page-top" class="flex items-center">
            <img src="img/logo.png" class="h-8" alt="Logo" />
            <style>
                /* Define color cycle animation */
                @keyframes colorCycleSI {
                    0% {
                        color: #0093DD;
                    }

                    33% {
                        color: #EA891B;
                    }

                    66% {
                        color: #68B92E;
                    }

                    100% {
                        color: #0093DD;
                    }
                }

                @keyframes colorCycleNER {
                    0% {
                        color: #68B92E;
                    }

                    33% {
                        color: #0093DD;
                    }

                    66% {
                        color: #EA891B;
                    }

                    100% {
                        color: #68B92E;
                    }
                }

                @keyframes colorCycleGITAS {
                    0% {
                        color: #EA891B;
                    }

                    33% {
                        color: #68B92E;
                    }

                    66% {
                        color: #0093DD;
                    }

                    100% {
                        color: #EA891B;
                    }
                }

                .animated-si {
                    animation: colorCycleSI 3s infinite;
                }

                .animated-ner {
                    animation: colorCycleNER 3s infinite;
                }

                .animated-gitas {
                    animation: colorCycleGITAS 3s infinite;
                }
            </style>

            <span class="items-center text-lg font-bold flex text-white font-lexend">
                <span class="animated-si">SI</span>
                <span class="animated-ner">NER</span>
                <span class="animated-gitas">GITAS</span>
            </span>

        </a>

        <div class="items-center hidden w-full md:flex md:w-auto " id="navbar-sticky">
            <ul class="flex gap-3 p-1 font-medium rounded-lg scroll-smooth">
                <li>
                    <a href="#" class="block py-1 px-2 text-black rounded hover:text-[#68B92E]">Home</a>
                </li>

                <li>
                    <a href="#tentang" class="block py-1 px-2 text-black rounded hover:text-[#68B92E]">Tentang</a>
                </li>
                @foreach ($judul as $item)
                    <li>
                        <a href="#{{ $item->nama }}"
                            class="block py-1 px-2 text-black rounded hover:text-[#68B92E]">{{ $item->nama }}</a>
                    </li>
                @endforeach
                <li>
                    <a href="#contact" class="block py-1 px-2 text-black rounded hover:text-[#68B92E]">Kontak</a>
                </li>
            </ul>
        </div>
        @auth
            @if (Auth::user()->role === 'karyawan')
                <!-- Tampilan untuk Karyawan -->
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow d"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                @if ($dataUser)
                                    <div class="user-info text-black">
                                        <p>{{ $dataUser->name }}</p>
                                        <p>{{ $dataUser->email }}</p>
                                    </div>
                                @else
                                    <p>Pengguna tidak ditemukan atau belum login.</p>
                                @endif
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role === 'admin')
                <!-- Tampilan untuk Admin -->
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                                aria-expanded="false" data-dropdown-toggle="dropdown-admin">
                                <span class="sr-only">Open admin menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="admin photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow d"
                            id="dropdown-admin">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 " role="none">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate " role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                            Dashboard
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <!-- Jika login tapi bukan karyawan atau admin, Anda bisa tampilkan pesan atau link lain -->
            @endif
        @endauth

        @guest
            <!-- Jika pengguna belum login -->
            <div>
                <a href="/login" class="font-serif">Login</a>
            </div>
        @endguest



    </div>
</nav>


<!-- <button class="btn-primary btn px-4 py-2 bg-[#0093DD] rounded-lg text-white">
                Login
            </button>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>-->
