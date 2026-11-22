
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POS Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">
                        Welcome to the Point of Sale System!
                    </h3>

                    <p>You are successfully logged in.</p>
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        POS Navigation
                    </h3>

                    <div class="flex flex-wrap gap-4">
                        <a href="/"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Home
                        </a>

                        <a href="/about"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            About
                        </a>

                        <a href="/customers"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Customers
                        </a>

                        <a href="/users"
                           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Users
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
