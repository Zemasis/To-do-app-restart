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
        Schema::create('dataseed', function (Blueprint $table) {
            $table->integer('id')->length(3)->autoIncrement(); // ID int(3), tự động tăng
            $table->string('name', 20); // VARCHAR(20)
            $table->string('description', 50)->nullable();; // VARCHAR(50)
            $table->text('state'); // TEXT
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataseed');
    }
};
