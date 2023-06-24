
<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Maurice IT development Portfolio') }}
        </h2>

        <br>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

<br>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
<br>

        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('admin') }}" class="btn btn-primary">Go to Admin Page</a>
            @endif
        @endauth

        <br>
        <br>

        @can('is-admin')
            <!-- Only admin can see this content -->
            <!-- This button won't appear if the user is not an admin -->
        @else
            <!-- If the user is not an admin they will see this -->
            <a href="{{ route('makeAdmin', ['id' => Auth::id()]) }}" class="btn btn-primary">Make me an Admin</a>
        @endcan

        <br>



    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/dogs">Go to Maurice Dogs</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/dogs/create">Create a Dog</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
