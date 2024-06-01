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
                        {{ __('home.Roles') }}
                    </h4>
                    @can('create role')
                        <a href="{{ route('role.create') }}" class="text-indigo-600 hover:text-indigo-900">Add
                            Role</a>
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
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }}">
                                        <td class="px-6 py-4">{{ $role->id }}</td>
                                        <td class="px-6 py-4">{{ $role->name }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col space-y-2">
                                                @can('update role')
                                                    <a href="{{ route('role.edit', $role->id) }}"
                                                        class="text-blue-600 hover:text-blue-900">Edit</a>
                                                    <a href="{{ url('role/' . $role->id . '/give-permissions') }}"
                                                        class="text-blue-600 hover:text-blue-900">Add/Edit Role
                                                        Permission</a>
                                                @endcan
                                                @can('delete role')
                                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                        class="inline-block">
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
