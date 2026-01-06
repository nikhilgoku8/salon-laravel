<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 150);
            $table->string('lname', 150);
            $table->string('email', 150);
            $table->string('phone', 10);
            $table->text('address');
            $table->foreignId('package_id')->nullable()->constrained('packages');
            $table->integer('total_price');

            $table->foreignId('slot_id')->constrained('time_slots')->onDelete('restrict');
            $table->date('booking_date');

            // Slot snapshot
            $table->time('start_time');
            $table->time('end_time');

            $table->string('status', 20)->comment('pending, confirmed, cancelled')->default('pending');
            $table->unique(['slot_id', 'booking_date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
