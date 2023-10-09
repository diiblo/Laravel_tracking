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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("nameDoc");
            $table->string("comment");
            $table->string("image")->nullable();
            $table->integer("sender")->default(0);
            $table->integer("receiver")->default(0);
            $table->unsignedTinyInteger("statut")->default(0)->comment('0: prossess, 1: send, 2: receive');
            $table->unsignedTinyInteger("etat")->default(0)->comment('0: inProcess, 1: archive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
