<x-guest-layout>
    <style>
        table, th, td{
            border: 1px solid black; 
            padding:10px
        }
    </style>

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
            <a href="/admin/dashboard">
                Back
            </a>
        </x-button>

        
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 bg-white border-b border-gray-200">
            All Users
        </div>
    </div>
    <x-button class="ml-3 mt-3">
        <a href="/admin/pending/users">
            Pending
        </a>
    </x-button>

    <x-button class="ml-3 mt-3"> 
        <a href="/admin/active/users">
            Active
        </a>
    </x-button>

    <div class="ml-3 mt-3">
        <table >
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th></th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        @if ($user->status == 'Pending')
                            <x-button>
                                <a href="/admin/users/{{ $user->id }}/activate">
                                    Activate user
                                </a>
                            </x-button>                
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



</x-guest-layout>
