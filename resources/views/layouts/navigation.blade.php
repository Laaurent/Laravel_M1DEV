<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a  class="w-4 mr-2 transform hover:text-purple-500 " href="{{ route('dashboard') }}">
                       <svg fill="none" stroke="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="48.997px" height="48.997px" viewBox="0 0 48.997 48.997" style="enable-background:new 0 0 48.997 48.997;"
                            xml:space="preserve">

                            <path d="M48.57,30.349c0.189-0.166,0.314-0.402,0.314-0.676v-5.015c0-0.222-0.082-0.436-0.229-0.601l-3.09-3.472h0.725
                                c0.499,0,0.902-0.403,0.902-0.902v-2.255c0-0.498-0.403-0.903-0.902-0.903h-3.469c-0.187,0-0.35,0.069-0.493,0.167l-4.394-6.182
                                c-0.17-0.237-0.441-0.38-0.734-0.38h-12.7h-0.004H11.796c-0.293,0-0.565,0.143-0.735,0.38l-4.393,6.182
                                c-0.144-0.098-0.308-0.167-0.493-0.167H2.706c-0.499,0-0.902,0.405-0.902,0.903v2.255c0,0.499,0.403,0.902,0.902,0.902h0.725
                                L0.34,24.057c-0.146,0.165-0.228,0.379-0.228,0.601v5.015c0,0.272,0.126,0.51,0.315,0.676C0.177,30.508,0,30.776,0,31.095v2.006
                                c0,0.5,0.403,0.901,0.902,0.901h0.007v2.906c0,1.099,1.202,1.959,2.734,1.959h3.348c1.533,0,2.734-0.86,2.734-1.959v-2.906h14.772
                                h0.004h14.771v2.906c0,1.099,1.201,1.959,2.734,1.959h3.348c1.533,0,2.734-0.86,2.734-1.959v-2.906h0.008
                                c0.498,0,0.901-0.401,0.901-0.901v-2.006C48.998,30.774,48.82,30.508,48.57,30.349z M46.729,25.326v3.442v0.399v0.168h-6v-0.168
                                v-0.399v-3.442H46.729z M12.263,11.936h12.234h0.004h12.233l4.349,6.076H24.501h-0.004H7.915L12.263,11.936z M24.497,25.326h0.004
                                h14.892v3.442v0.399v0.17H24.501h-0.004H9.606v-0.17v-0.399v-3.442H24.497z M13.318,23.32l2.26-3.013h8.919h0.004h8.919
                                l2.262,3.013H24.501h-0.004H13.318z M2.27,29.169v-0.398v-3.443h6.001v3.443v0.398v0.168H2.27V29.169z M47.596,32.599H24.501
                                h-0.004H1.404v-1.002h23.093h0.004h23.095V32.599z"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if (Auth::user()->isClient())
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Tableau de bord') }}
                    </x-nav-link>
                    <x-nav-link :href="route('showClient',Auth::id())" :active="request()->is('client/show/*')">
                        {{ __('Mon compte') }}
                    </x-nav-link>
                    @else
                    <x-nav-link :href="route('contracts')" :active="request()->is('contract*')">
                        {{ __('Contrats') }}
                    </x-nav-link>
                    <x-nav-link :href="route('controls')" :active="request()->is('control*')">
                        {{ __('Controles') }}
                    </x-nav-link>
                    <x-nav-link :href="route('employes')" :active="request()->is('employe*')">
                        {{ __('Employés') }}
                    </x-nav-link>

                    <x-nav-link :href="route('clients')" :active="request()->is('client*')">
                        {{ __('Clients') }}
                    </x-nav-link>
                    @endif
                    <x-nav-link :href="route('vehicules')" :active="request()->is('vehicule*')">
                        {{ __('Véhicules') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>