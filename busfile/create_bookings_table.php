<?php
Schema::create('bookings', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('schedule_id')->constrained()->onDelete('cascade');
$table->string('seat_number');
$table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
$table->timestamps();
});