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
        Schema::create('case_category_case_study', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('case_category_id');
            $table->unsignedBiginteger('case_study_id');

            $table->foreign('case_category_id')->references('id')
                ->on('case_categories')->onDelete('cascade');
            $table->foreign('case_study_id')->references('id')
                ->on('case_studies')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_categories_case_studies');
    }
};
