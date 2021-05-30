<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
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
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
               
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('S\'inscrire') }}
                    </a>
                

                <x-button class="ml-3 p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-40 justify-center focus:bg-purple-700 hover:bg-purple-500">
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
