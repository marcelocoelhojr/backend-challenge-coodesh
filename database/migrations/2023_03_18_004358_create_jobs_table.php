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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->enum('modality', ['Freelancer', 'PJ', 'CLT']);
            $table->enum('type', ['Presencial', 'Remoto', 'Hibrido']);
            $table->double('salary', 5.3)->nullable();
            $table->string('image');
            $table->string('description', 250);
            $table->enum('status', ['Em andamento', 'Pendente', 'Encerrado']);
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
