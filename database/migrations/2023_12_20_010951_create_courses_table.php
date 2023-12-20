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
        if (Schema::hasTable("courses")) return;
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->boolean('is_published')->default(true);
            $table->text('description')->nullable();
            $table->softDeletes();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id', 'post_category_idx');
            $table
                ->foreign('category_id')
                ->on('course_categories')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
