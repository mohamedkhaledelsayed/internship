<x-app-layout>
    @if (session('status'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-lg font-semibold">
                        Role : {{ $role->name }}
                        <a href="{{ route('role.index') }}"
                            class="text-indigo-600 hover:text-indigo-900 float-right">Back</a>
                    </h4>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ url('role/' . $role->id . '/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <laberl>
                                                <input type="checkbox" name="permissions[]"
                                                    value="{{ $permission->name }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                    class="form-control">
                                                {{ $permission->name }}
                                                </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                    class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
