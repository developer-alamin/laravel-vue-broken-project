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
        Schema::create('view_ids', function (Blueprint $table) {
            $table->id();
            $table->string('IdName',50);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ->restrictOnDelete()
            ->restrictOnUpdate();

            $table->enum("status",["deactive","active"])->default("active");
            
            $table->timestamp("created_at")
            ->useCurrent();
            $table->timestamp("updated_at")
            ->useCurrent()
            ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_ids');
    }
};
