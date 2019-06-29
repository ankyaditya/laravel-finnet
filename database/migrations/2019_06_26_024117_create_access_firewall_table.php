<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessFirewallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_firewall', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requester_name');
            $table->integer('source');
            $table->integer('destination');
            $table->integer('port');
            $table->string('project_name');
            $table->text('description');
            $table->timestamp('worked_date');
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
        Schema::dropIfExists('access_firewall');
    }
}
