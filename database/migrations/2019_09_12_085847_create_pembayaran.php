<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('jml_org');
            $table->string('nm_program', 191);
            $table->string('nm_pengajar', 191);
            $table->string('hari', 20);
            $table->string('waktu', 20);
            $table->string('kelas', 20);
            $table->integer('harga');
            $table->string('struk', 191)->nullable();
            $table->string('status', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
