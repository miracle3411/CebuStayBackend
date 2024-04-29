<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property', function (Blueprint $table) {
            $table->increments('propertyid');
            $table->unsignedInteger('userid');
            $table->foreign('userid')->references('userid')->on('users');
            $table->string('property_name');
            $table->string('property_type');
            $table->string('property_desc');
            $table->string('property_directions');
            $table->string('unit_type');
            $table->integer('number_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
