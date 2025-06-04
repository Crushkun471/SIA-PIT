<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            {{-- Admin Logout Form --}}
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('admin.logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

            {{-- Dashboard Stats --}}
            @php
                $totalCustomers = \App\Models\Customer::count();
                $totalPlants = \App\Models\Plant::count();
                $totalPurchases = \App\Models\Purchase::count();
                $recentCustomers = \App\Models\Customer::latest()->take(5)->get();
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- Total Customers --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Customers</h3>
                            <p class="text-4xl font-extrabold text-green-600 dark:text-green-400">
                                {{ $totalCustomers }}
                            </p>
                        </div>
                        <a href="{{ route('customers.index') }}"
                           class="ml-4 px-5 py-2.5 bg-green-600 text-white text-sm font-semibold rounded-md shadow hover:bg-green-700 transition duration-200">
                            Manage Customers
                        </a>
                    </div>
                </div>

                {{-- Total Plants --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Plants</h3>
                            <p class="text-4xl font-extrabold text-green-600 dark:text-green-400">
                                {{ $totalPlants }}
                            </p>
                        </div>
                        <a href="{{ route('plants.index') }}"
                           class="ml-4 px-5 py-2.5 bg-green-600 text-white text-sm font-semibold rounded-md shadow hover:bg-green-700 transition duration-200">
                            Manage Plants
                        </a>
                    </div>
                </div>

                {{-- Total Purchases --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 col-span-1 sm:col-span-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Total Purchases</h3>
                            <p class="text-4xl font-extrabold text-green-600 dark:text-green-400">
                                {{ $totalPurchases }}
                            </p>
                        </div>
                        <a href="{{ route('purchases.index') }}"
                           class="ml-4 px-5 py-2.5 bg-green-600 text-white text-sm font-semibold rounded-md shadow hover:bg-green-700 transition duration-200">
                            Manage Purchases
                        </a>
                    </div>
                </div>

                {{-- Recent Customers --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-xl p-6 col-span-1 sm:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Recent Customers</h3>
                    <ul class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        @forelse($recentCustomers as $customer)
                            <li class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 px-4 py-2 rounded-md">
                                <span class="font-medium">{{ $customer->name }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-300">
                                    {{ $customer->created_at->diffForHumans() }}
                                </span>
                            </li>
                        @empty
                            <li class="text-gray-500 dark:text-gray-400">No customers yet.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
