<x-guest-layout>
    <div class="mt-3 space-y-1">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
    
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            <label for="Send message to admin">Send a message to the admin</label>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('send-message') }}">
            @csrf

            <div>
                <x-label for="subject" :value="__('Subject')" />

                <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" required autofocus />
            </div>

            <div class="mt-3">
                <x-label for="message" :value="__('Message')" />

                <textarea id="message" rows="8"class="block mt-1 w-full" type="text" name="message" required autofocus></textarea>
            </div>



            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Send Message') }}
                </x-button>


                
            </div>
        </form>
        <x-button class="ml-3">
            <a href="{{ route('user.dashboard') }}">
                Back
            </a>
        </x-button>
    </x-auth-card>
</x-guest-layout>
