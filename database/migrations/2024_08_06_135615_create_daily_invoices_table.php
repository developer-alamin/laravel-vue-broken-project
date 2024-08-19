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
        Schema::create('daily_invoices', function (Blueprint $table) {
            $table->id();
            $table->char("taka");
            $table->json("note")->nullable();

            $table->foreignId("user_id");
            $table->foreign('user_id')->references('id')->on('users')
            ->restrictOnDelete()
            ->restrictOnUpdate();
            
            $table->boolean("status")->default(false);

            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_invoices');
    }
};
