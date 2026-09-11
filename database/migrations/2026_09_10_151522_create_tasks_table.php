<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('tasks', function (Blueprint $table) {


            $table->id();


            // Task berada di project
            $table->foreignId('project_id')
                  ->constrained('projects')
                  ->cascadeOnDelete();


            $table->string('title');


            $table->text('description')
                  ->nullable();



            // Prioritas task
            $table->enum('priority', [

                'low',
                'medium',
                'high'

            ])
            ->default('medium');



            // Deadline task
            $table->date('deadline')
                  ->nullable();



            // Status task
            $table->enum('status', [

                'todo',
                'doing',
                'done'

            ])
            ->default('todo');



            $table->timestamps();


        });

    }



    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }

};