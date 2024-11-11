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
        Schema::create('type_of_fencings', function (Blueprint $table) {
            $table->id();

            $table->boolean('indineous');
            $table->boolean('rc');
            $table->boolean('rc_and_concrete_hollow_blocks');
            $table->boolean('rc_and_blocks');
            $table->boolean('rc_and_interlink_wire');
            $table->boolean('rc_and_steel_matting');
            $table->boolean('rc_and_barbed_wire_and_other_wires');

            $table->string('others')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_of_fencings');
    }
};
