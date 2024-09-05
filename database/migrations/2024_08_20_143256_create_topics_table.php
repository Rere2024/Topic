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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('image')->nullable();
            $table->foreignId('category_id');
            $table->string('content', 100);
            $table->integer('no_of_views')->default(0);
            $table->boolean('published');
            $table->boolean('trending');
            $table->softDeletes();
            $table->timestamps();
        });
    }
//->constrained('categories')
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
