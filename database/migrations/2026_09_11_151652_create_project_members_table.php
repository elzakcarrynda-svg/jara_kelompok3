<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {
        if (Schema::hasTable('project_members')) {
            return;
        }


        Schema::create('project_members', function (Blueprint $table) {


            $table->id();



            // Project yang diikuti
            $table->foreignId('project_id')
                  ->constrained('projects')
                  ->cascadeOnDelete();



            // User anggota
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();



            $table->timestamps();



            // Mencegah user masuk project yang sama dua kali
            $table->unique([
                'project_id',
                'user_id'
            ]);


        });

    }



    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }

};