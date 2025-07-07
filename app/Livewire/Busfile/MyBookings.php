<?php

namespace App\Livewire\Busfile;
Route::get('/book', BookingForm::class);
use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class MyBookings extends Component
{
    public $bookings = [];

    public function mount()
    {
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $this->bookings = Booking::where('user_id', Auth::id())
            ->orderByDesc('travel_date')
            ->get();
    }

    public function cancelBooking($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->first();

        if ($booking) {
            $booking->delete();
            session()->flash('success', 'Booking canceled successfully.');
            $this->loadBookings();
        } else {
            session()->flash('error', 'Booking not found.');
        }
    }

    public function render()
    {
        return view('livewire.busfile.my-bookings');
    }
}
