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
        Schema::create('documents_requirements', function (Blueprint $table) {
            $table->id();

            $table->boolean('certificate_true_copy_of_tct');
            $table->boolean('contract_of_leases_duly_notarized');
            $table->boolean('plans_and_design_of_fence_over');
            $table->boolean('tax_declaration_tax_receipt');
            $table->boolean('location_plan_and_vicinity_map');
            $table->string('other')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents_requirements');
    }
};
