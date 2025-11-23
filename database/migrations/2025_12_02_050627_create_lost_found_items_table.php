<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lost_found_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->text('description')->nullable();
            $table->enum('status', ['lost', 'found', 'claimed'])->default('lost');

            $table->unsignedBigInteger('reported_by');   // user yang lapor
            $table->unsignedBigInteger('claimed_by')->nullable(); // user yang claim

            $table->timestamps();

            $table->foreign('reported_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('claimed_by')->references('id')->on('users')->onDelete('set null');
        });


    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_found_items');
    }
};
