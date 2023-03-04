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
        Schema::create('votes', function (Blueprint $table) {
            $table->string('vote_id');
            $table->string('user_id');
            $table->string('pub_id');
            $tabe->string('type');
            $table->timestamps();

            $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');

            $table->foreign('pub_id')
          ->references('pub_id')
          ->on('publications')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
