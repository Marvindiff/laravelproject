<?php

namespace App\Livewire\Busfile;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingForm extends Component
{
    public $origin, $destination, $date, $preferred_time;
    public $schedules = [], $selectedSchedule = null;
    public $seat_number, $step = 1;
   
    public function searchSchedules()
{
    if (!$this->origin || !$this->destination || !$this->date) {
        session()->flash('error', 'All fields are required.');
        return;
    }

    // Search actual database schedules (or replace with your real logic)
    $this->schedules = \App\Models\Schedule::where('origin', 'LIKE', '%' . $this->origin . '%')
        ->where('destination', 'LIKE', '%' . $this->destination . '%')
        ->where('travel_date', $this->date)
        ->get()
        ->toArray();

    if (empty($this->schedules)) {
        session()->flash('error', 'No schedules found for your criteria.');
        return;
    }

    $this->step = 2;
}


    public function selectSchedule($id)
    {
        $this->selectedSchedule = collect($this->schedules)->firstWhere('id', $id);
        $this->step = 3;
    }

    public function bookSeat()
    {
        if (!$this->seat_number) {
            session()->flash('error', 'Please enter your seat number.');
            return;
        }

        Booking::create([
            'user_id' => Auth::id(),
            'origin' => $this->selectedSchedule['origin'],
            'destination' => $this->selectedSchedule['destination'],
            'travel_date' => $this->selectedSchedule['travel_date'],
            'departure_time' => $this->selectedSchedule['departure_time'],
            'arrival_time' => $this->selectedSchedule['arrival_time'],
            'seat_number' => $this->seat_number,
            'bus_number' => $this->selectedSchedule['bus_number'],
            'type' => $this->selectedSchedule['type'],
            'price' => $this->selectedSchedule['price'],
            'preferred_time' => $this->preferred_time,
        ]);

        session()->flash('success', 'Booking successful!');

        $this->reset([
            'origin',
            'destination',
            'date',
            'preferred_time',
            'schedules',
            'selectedSchedule',
            'seat_number'
        ]);

        $this->step = 1;
    }

   public function render()
    {
    return view('livewire.busfile.booking-form')->layout('layouts.app');
    }
}
