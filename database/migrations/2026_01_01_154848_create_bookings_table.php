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
            $table->string('patient_name', 150);
            $table->string('patient_email', 150);
            $table->string('patient_phone', 10);
            $table->foreignId('specialization_id')->constrained('specializations')->onDelete('restrict');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('restrict');
            $table->foreignId('slot_id')->constrained('time_slots')->onDelete('restrict');
            $table->date('appointment_date');
            $table->text('patient_message')->nullable();
    
            // Doctor snapshot
            $table->string('specialization_name', 150);
            $table->string('doctor_name', 150);

            // Slot snapshot
            $table->time('start_time');
            $table->time('end_time');

            $table->text('doctor_remarks')->nullable();
            $table->string('status', 20)->comment('pending, confirmed, cancelled')->default('pending');
            $table->unique(['doctor_id', 'slot_id', 'appointment_date']);
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
