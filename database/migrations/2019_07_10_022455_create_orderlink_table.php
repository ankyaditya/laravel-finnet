<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('requester_name');
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->integer('notelpon');
            $table->string('namapic');
            $table->integer('nopic');
            $table->string('emailpic');
            $table->string('environtment');
            $table->string('providerlink');
            $table->string('jenislink');
            $table->string('backhaul');
            $table->string('bandwidthlink');
            $table->string('ikg');
            $table->date('targetdate');
            $table->date('request_date');
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
        Schema::dropIfExists('orderlink');
    }
}
