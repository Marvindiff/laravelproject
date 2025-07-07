<?php
namespace App\Livewire\Busfile;

use Livewire\Component;
use App\Models\Booking;

class BookingForm extends Component
{
    public $booking;

    public function mount($id)
    {
        // Load the booking with relationships
        $this->booking = Booking::with(['user', 'schedule', 'payment'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.busfile.booking-form');
    }
}
