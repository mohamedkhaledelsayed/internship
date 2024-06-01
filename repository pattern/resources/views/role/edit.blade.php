<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-semibold">
                        {{ __('home.Edit Role') }}
                        <a href="{{ route('role.index') }}"
                            class="text-indigo-600 hover:text-indigo-900 float-right">Back</a>
                    </h4>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name"
                                class="block text-gray-700 font-medium">{{ __('home.Role Name') }}</label>
                            <input type="text" name="name" id="name" value="{{ $role->name }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-black font-semibold rounded-md hover:bg-indigo-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
