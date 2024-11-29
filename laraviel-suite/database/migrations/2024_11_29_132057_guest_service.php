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
        Schema::create('availed_services', function (Blueprint $table) {
            $table->id("guest_service_id");
            $table->string("booking_id");
            $table->string("guest_name");
            $table->string("service_id");
            $table->text("service_date");
            $table->text("payment_status");
            $table->decimal("total_price", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
