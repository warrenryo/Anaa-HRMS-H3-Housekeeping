<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Users</title>

    <!--FLOWBITE-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation')
    @include('Users.usersModal')
    <div class="py-12">
        <div class="max-w-screen sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="justify-end flex">
                        <a href="{{ url('register-user') }}"
                            class="mb-6   text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <i class="fa-solid fa-plus"></i> Add User
                        </a>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Position
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $users)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$users->id}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$users->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$users->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$users->role}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ url('edit-user/id='.$users->id) }}" class="text-blue-700">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        @if($users->role == 'Admin' && $users->email == 'admin@gmail.com')
                                        <button disabled
                                            class="deleteBtn cursor-not-allowed ml-4 text-gray-500">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @else
                                        <button data-modal-target="deleteUser" data-modal-toggle="deleteUser" value="{{$users->id}}"
                                            class="deleteBtn ml-4 text-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script>
        const deleteBtn = document.querySelectorAll('.deleteBtn');
        const delete_id = document.getElementById('delete_id');

        deleteBtn.forEach(function(deleteBtn){
            deleteBtn.addEventListener('click', function(){
                const buttonValue = deleteBtn.getAttribute('value');

                delete_id.value = buttonValue;
            })
        })
    </script>


    <!--FLOWBITE SCRIPT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!--FLOWBITE CHARTS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</body>

</html>