<div>
    {{-- Flash messages --}}
    @if (session()->has('error'))
        <div class="bg-red-200 text-red-700 p-3 rounded mb-2">{{ session('error') }}</div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded mb-2">{{ session('success') }}</div>
    @endif

    {{-- Step 1: Booking Search Form --}}
    @if ($step === 1)
        <form wire:submit.prevent="searchSchedules" class="space-y-4">
            <div>
                <label for="origin">Origin</label>
                <input type="text" id="origin" wire:model="origin" class="w-full p-2 rounded border">
            </div>
            <div>
                <label for="destination">Destination</label>
                <input type="text" id="destination" wire:model="destination" class="w-full p-2 rounded border">
            </div>
            <div>
                <label for="date">Travel Date</label>
                <input type="date" id="date" wire:model="date" class="w-full p-2 rounded border">
            </div>
            <div>
                <label for="preferred_time">Preferred Time</label>
                <input type="time" id="preferred_time" wire:model="preferred_time" class="w-full p-2 rounded border">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search Booking</button>
        </form>

    {{-- Step 2: Show Available Schedules --}}
    @elseif ($step === 2)
        <div>
            <h3 class="text-lg font-bold mb-4">Available Schedules</h3>
            @foreach ($schedules as $schedule)
                <div class="p-4 border rounded mb-3">
                    <p><strong>Bus:</strong> {{ $schedule['bus_number'] }} ({{ $schedule['type'] }})</p>
                    <p><strong>Time:</strong> {{ $schedule['departure_time'] }} - {{ $schedule['arrival_time'] }}</p>
                    <p><strong>Price:</strong> ₱{{ $schedule['price'] }}</p>
                    <button wire:click="selectSchedule({{ $schedule['id'] }})" class="bg-green-500 text-white px-3 py-1 rounded mt-2">Select</button>
                </div>
            @endforeach
        </div>

    {{-- Step 3: Booking Confirmation --}}
    @elseif ($step === 3 && $selectedSchedule)
        <div>
            <h3 class="text-lg font-bold mb-4">Confirm Booking</h3>
            <p><strong>Bus Number:</strong> {{ $selectedSchedule['bus_number'] }}</p>
            <p><strong>Seat Number:</strong></p>
            <input type="text" wire:model="seat_number" class="w-full p-2 border rounded my-2">
            <button wire:click="bookSeat" class="bg-blue-600 text-white px-4 py-2 rounded">Book Now</button>
        </div>
          
    <form wire:submit.prevent="searchSchedules">
    <input type="text" wire:model="origin">
    <input type="text" wire:model="destination">
    <input type="date" wire:model="date">
    <button type="submit">Search Booking</button>
     </form>

        {{-- Optional Booking Details (only if booking is set) --}}
        @isset($booking)
        <div class="mt-4">
            <h2 class="text-lg font-semibold">Booking Details</h2>
            <p><strong>User:</strong> {{ $booking->user->name }}</p>
            <p><strong>Schedule:</strong> {{ $booking->schedule->route ?? 'N/A' }}</p>
            <p><strong>Payment Status:</strong> {{ $booking->payment->status ?? 'Unpaid' }}</p>
        </div>
        @endisset
    @endif
</div>
