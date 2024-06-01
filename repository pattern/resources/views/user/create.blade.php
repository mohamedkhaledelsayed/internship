<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 flex justify-between items-center">
                <h4 class="text-lg font-semibold">
                    {{ __('home.Create User') }}
                </h4>
                <a href="{{ url('users') }}" class="text-indigo-600 hover:text-indigo-900">Back</a>
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <form class="w-full max-w-lg mx-auto" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium">{{ __('home.Name') }}</label>
                        <input type="text" name="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">{{ __('home.Email') }}</label>
                        <input type="text" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium">{{ __('home.Password') }}</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                    </div>
                    <div class="mb-4">
                        <label for="roles" class="block text-gray-700 font-medium">{{ __('home.Roles') }}</label>
                        <select name="roles[]" class="form-multiselect block w-full mt-1" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-black rounded-md hover:bg-indigo-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
