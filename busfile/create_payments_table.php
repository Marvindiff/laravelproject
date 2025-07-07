<?php
Schema::create('payments', function (Blueprint $table) {
$table->id();
$table->foreignId('booking_id')->constrained()->onDelete('cascade');
$table->decimal('amount', 8, 2);
$table->string('method'); // GCash, Cash, Bank
$table->string('reference')->nullable();
$table->enum('status', ['unpaid', 'paid', 'failed'])->default('unpaid');
$table->timestamps();
});