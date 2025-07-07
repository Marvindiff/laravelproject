<div class="p-4 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">🧾 My Bookings</h2>

    @if (session()->has('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-3">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-3">{{ session('error') }}</div>
    @endif

    @if ($bookings->isEmpty())
    <p class="text-gray-600">You haven’t booked any tickets yet.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-left px-4 py-2">Date</th>
                    <th class="text-left px-4 py-2">Route</th>
                    <th class="text-left px-4 py-2">Bus</th>
                    <th class="text-left px-4 py-2">Seat</th>
                    <th class="text-left px-4 py-2">Fare</th>
                    <th class="text-left px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr class="border-t hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $booking->travel_date }}</td>
                    <td class="px-4 py-2">{{ $booking->origin }} → {{ $booking->destination }}</td>
                    <td class="px-4 py-2">{{ $booking->bus_number }} ({{ $booking->type }})</td>
                    <td class="px-4 py-2">{{ $booking->seat_number }}</td>
                    <td class="px-4 py-2">₱{{ $booking->price }}</td>
                    <td class="px-4 py-2">
                        <button wire:click="cancelBooking({{ $booking->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                            Cancel
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>