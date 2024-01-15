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
        Schema::create('balls', function (Blueprint $table) {
            $table->id();
            $table->string('model'); // model bu yerda day larni kiritish uchun
            $table->unsignedBigInteger('model_id');
            $table->string('table');
            $table->string('table_id')->nullable(); // table bu yerda grammer, vocabulary bo'lishi mumkun
            $table->tinyInteger('scores')->default(0);
            $table->tinyInteger('coins')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balls');
    }
};
