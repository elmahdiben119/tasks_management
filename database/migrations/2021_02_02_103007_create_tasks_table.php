<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->integer('user_id');
            $table->integer('task_type');
            $table->enum('status',['in progress', 'completed']);
            $table->timestamps();
        });

        DB::table('tasks')->insert(
            array(
                'name' => 'Développement API',
                'description' => 'Développement API de création de user',
                'start_at' => '2021-02-17 10:16:40',
                'end_at' => '2021-02-18 10:16:40',
                'user_id' => 1,
                'task_type' => 1,
                'status' => 'in progress',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
