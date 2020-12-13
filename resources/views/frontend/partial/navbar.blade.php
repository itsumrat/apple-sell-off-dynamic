<nav class="lg:px-16 px-6 bg-yellow-500 flex flex-wrap items-center lg:py-0 py-2">
    <a class="p-2 flex text-gray-700" href="/">
        <svg height="36" viewbox="0 0 32 36" width="32" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z">
            </path>
        </svg>
        <span class="mt-2 ml-5 text-gray-700">
            SSL Eshop
        </span>
    </a>
    <button class="text-black inline-flex p-3 hover:bg-gray-700 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
        <i class="material-icons">
            menu
        </i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="relative ml-auto w-3/5">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" fill="none" viewbox="0 0 24 24">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    </path>
                </svg>
            </span>
            <input class="w-full border border-red-700 rounded-full pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline shadow-md" placeholder="Search" type="text">
            </input>
        </div>
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
            <a class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 items-center justify-center text-black hover:bg-gray-700 hover:text-white" href="#">
                <i class="fas fa-heart">
                </i>
            </a>
            <a class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 items-center justify-center text-black hover:bg-gray-700 hover:text-white" href="#">
                <i class="fas fa-cart-arrow-down">
                </i>
            </a>
            @auth
            <div class="dropdown inline-block relative">
                <a class="lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-gray-700 items-center justify-center text-black hover:bg-gray-700 hover:text-white" href="/">
                    <i class="fas fa-user text-sm">
                    </i>
                </a>
                <ul class="dropdown-menu absolute right-0 hidden text-gray-700 pt-1">
                    <li class="bg-yellow-500">
                        <a class="text-sm rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">
                            Profile
                        </a>
                    </li>
                    <li class="">
                        <a class="text-sm bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">
                            Orders
                        </a>
                    </li>
                    <li class="">
                        <a class="text-sm rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2">
                            </i>
                            Logout
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a class="lg:inline-flex lg:w-auto w-full ml-5 px-3 py-2 border border-red-500 rounded-full text-gray-900 text-sm items-center justify-center bg-red-500 hover:bg-red-700 hover:text-white shadow-md" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt text-sm pr-1">
                </i>
                Sign In
            </a>
            @endauth
        </div>
    </div>
</nav>
