<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_os', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requester_name');
            $table->string('username');
            $table->string('source');
            $table->string('roles');
            $table->string('project_name');
            $table->text('description');
            $table->string('worked_by')->nullable();
            $table->timestamp('worked_date')->nullable();
            $table->string('checked_by')->nullable();
            $table->timestamp('checked_date')->nullable();
            $table->string('approved_by')->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->integer('step');
            $table->enum('status_checked', ['Pending', 'Approved']);
            $table->enum('status_worked', ['Pending', 'Approved']);
            $table->enum('status_approval', ['Pending', 'Approved', 'Disapprove']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_os');
    }
}
