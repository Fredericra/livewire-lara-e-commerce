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
        Schema::create('params', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->boolean('tsena')->default("0")->nullable();
            $table->boolean('pub')->default("0")->nullable();
            $table->boolean('emploi')->default("0")->nullable();
            $table->boolean('premuim')->default("0")->nullable();
            $table->boolean('autre')->default("0")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('params');
    }
};
