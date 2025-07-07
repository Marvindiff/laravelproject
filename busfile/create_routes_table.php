<?php
Schema::create('routes', function (Blueprint $table) {
$table->id();
$table->string('origin');
$table->string('destination');
$table->decimal('distance', 8, 2)->nullable();
$table->timestamps();
});