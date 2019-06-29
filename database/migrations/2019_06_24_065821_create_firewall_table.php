<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirewallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewall', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requester_name');
            $table->string('name_for_acces');
            $table->string('firewall_address');
            $table->string('role');
            $table->string('project_name');
            $table->text('description');
            $table->integer('checked_by')->nullable();
            $table->enum('status_checked', ['Pending', 'Approved']);
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('firewall');
    }
}
