<x-guest-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="mt-3 space-y-1">
        <!-- Authentication -->
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Admin! You're logged in!
                </div>
            </div>
        </div>

        <x-button class="ml-3 mt-3">
            <a href="/admin/messages">
                Messages
            </a>
        </x-button>

        <x-button class="ml-3 mt-3">
            <a href="/admin/users">
                Users
            </a>
        </x-button>
        
    </div>
</x-guest-layout>
