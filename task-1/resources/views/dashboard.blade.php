<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    <br>
                    @can('show category')
                        <a class="btn btn-sm btn-success" href={{ route('category.index') }}>{{trans('main.Categories')}} </a>

                    @endcan

                    <br>
                    <br>
                    @can('show product')
                        <a class="text-success" href={{ route('product.index') }}> {{trans('main.Products')}}</a>

                    @endcan

                    <br>
                    <br>
                    @can('show user')
                    <a class="text-success" href={{ route('user.index') }}> User</a>
                    @endcan
                    <br>
                    <br>
                    @can('show role')
                    <a class="text-success" href={{ route('role.index') }}> Role</a>
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
