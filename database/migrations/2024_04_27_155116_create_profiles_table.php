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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("users_id")->constrained();
            $table->foreign("users_id")->references("id")->on("users")
            ->restrictOnUpdate()
            ->cascadeOnDelete();

            $table->enum("gender",["male","female","others"])->nullable();
            $table->char("date")->nullable();
            $table->string("img")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
