public function bus() {
return $this->belongsTo(Bus::class);
}
public function route() {
return $this->belongsTo(Route::class);
}
public function bookings() {
return $this->hasMany(Booking::class);
}