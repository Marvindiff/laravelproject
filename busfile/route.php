<?php
use App\Models\Schedule;

class Bus extends Model
{
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}