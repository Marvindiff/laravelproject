<?php
Schema::create('schedules', function (Blueprint $table) {
$table->id();
$table->foreignId('bus_id')->constrained()->onDelete('cascade');
$table->foreignId('route_id')->constrained()->onDelete('cascade');
$table->date('travel_date');
$table->time('departure_time');
$table->time('arrival_time');
$table->decimal('price', 8, 2);
$table->timestamps();
});