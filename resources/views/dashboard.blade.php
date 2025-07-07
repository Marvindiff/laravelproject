<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Quantum Sky Bus</h3>

                <div class="space-x-2">
                    <!-- Search Schedule just scrolls to the form for now -->
                    <a href="#booking-form" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Search Schedule
                    </a>

                    <!-- My Bookings link -->
                    <a href="{{ route('book') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        My Bookings
                    </a>
                </div>
            </div>

            <!-- Booking Form -->
            <div id="booking-form" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                @livewire('busfile.booking-form')
            </div>
        </div>
    </div>
</x-app-layout>
