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
        Schema::create('inv_classes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("class_id");
            $table->unsignedBigInteger("users_id");

            $table->foreign("class_id")->references("id")->on("class")
            ->restrictOnUpdate()
            ->restrictOnDelete();

            $table->foreign("users_id")->references("id")->on("users")
            ->restrictOnUpdate()
            ->restrictOnDelete();

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_classes');
    }
};
