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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('icon');
            //            $table->string('slug')->unique();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('small_description_en');
            $table->string('small_description_ar');
            $table->longText('description_en');
            $table->longText('description_ar');
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
        Schema::dropIfExists('services');
    }
};
