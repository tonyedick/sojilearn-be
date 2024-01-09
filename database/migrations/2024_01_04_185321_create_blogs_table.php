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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('intro');
            $table->longText('detailsOne');
            $table->longText('detailsTwo');
            $table->longText('detailsThree')->nullable();
            $table->string('featuredImage', 2048)->nullable();
            $table->string('thumbnail', 2048)->nullable();
            $table->string('image', 2048)->nullable();
            $table->string('video')->nullable();
            $table->string('link')->nullable();
            $table->enum('category', ['Tech', 'Programming', 'School', 'Scholarship', 'Tuition', 'Accomodation', 'Visa']);
            $table->integer('featured')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
