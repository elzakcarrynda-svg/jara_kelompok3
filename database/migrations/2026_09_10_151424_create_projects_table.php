<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('projects', function (Blueprint $table) {


            $table->id();


            // Nama project/list
            $table->string('name');


            // Deskripsi project
            $table->text('description')
                  ->nullable();


            // User pembuat project
            $table->foreignId('owner_id')
                  ->constrained('users')
                  ->cascadeOnDelete();


            $table->timestamps();


        });

    }


    public function down(): void
    {
        Schema::dropIfExists('projects');
    }

};