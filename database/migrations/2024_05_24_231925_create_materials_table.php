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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('icon');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('small_description_en');
            $table->string('small_description_ar');
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('unit_price');
            $table->boolean('is_published')->default(true);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
