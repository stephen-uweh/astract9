<x-guest-layout>
    <style>
        table, th, td{
            border: 1px solid black; 
            padding:10px
        }
    </style>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>

        <x-button class="ml-3 mt-3">
            <a href="/dashboard">
                Dashboard
            </a>
        </x-button>

        <x-button class="ml-3 mt-3">
            <a href="{{ route('send-message-page') }}">
                Send Message
            </a>
        </x-button>

        
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 bg-white border-b border-gray-200">
            All messages
        </div>
    </div>
    <div class="ml-3 mt-3">
        <table >
            <tr>
                <th>Date and Time</th>
                <th>Message</th>
            </tr>
            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->message }}</td>
                </tr>
            @endforeach
        </table>
    </div>

</x-guest-layout>
