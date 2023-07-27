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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->longText("model")->nullable();
            $table->longText("descipt");
            $table->longText("nom")->nullable();
            $table->integer("prix")->nullable();
            $table->integer("stock")->nullable();
            $table->string("billet")->nullable();
            $table->boolean("emploi")->nullable();
            $table->boolean("pub")->nullable();
            $table->boolean("offre")->default("0")->nullable();
            $table->string("autre")->default("0")->nullable();
            $table->foreignId('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
