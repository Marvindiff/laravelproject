<?php
Schema::create('buses', function (Blueprint $table) {
$table->id();
$table->string('bus_number')->unique();
$table->integer('seats');
$table->string('type'); // e.g. Regular, Deluxe, Aircon
$table->timestamps();
});