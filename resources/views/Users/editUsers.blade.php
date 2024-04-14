<x-guest-layout>
    <form method="POST" action="{{ url('update-user/id='.$user->id) }}">
        @csrf
        @method('PUT')
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" value="{{$user->name}}" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" value="{{$user->email}}" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Role</label>
            <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option @if ($user->role == 'Admin') selected @endif>Admin</option>
                <option @if ($user->role == 'Housekeeping Manager') selected @endif>Housekeeping Manager</option>
                <option @if ($user->role == 'Maintenance Manager') selected @endif>Maintenance Manager</option>
                <option @if ($user->role == 'Door Lock Manager') selected @endif>Door Lock Manager</option>
                <option @if ($user->role == 'Inventory Manager') selected @endif>Inventory Manager</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Submit') }}
            </x-primary-button>
            <a href="{{ url('users') }}"
                class="ml-4 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Cancel
            </a>
        </div>
    </form>
</x-guest-layout>