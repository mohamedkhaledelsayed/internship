<x-app-layout>
    <div class="py-12">
        @if (session('status'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    <h4 class="text-lg font-semibold">
                        {{ __('home.Users') }}
                    </h4>
                    @can('create user')
                        <a href="{{ route('users.create') }}" class="text-indigo-600 hover:text-indigo-900">Create
                            User</a>
                    @endcan

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">
                                        ID</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-gray-600">
                                        Name</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-right leading-4 text-gray-600">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-right leading-4 text-gray-600">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <td class="px-6 py-4">{{ $user->id }}</td>
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <label
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xl font-large leading-4 bg-green-100 text-green-800">
                                                    {{ $rolename }}
                                                </label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col space-y-2">
                                            @can('update user')
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="text-blue-600 hover:text-blue-900">Edit</a>
                                            @endcan
                                            @can('delete user')
                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                    method="POST"class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
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
</x-app-layout>
