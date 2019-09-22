<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('name', 50);
            $table->string('email', 191);
            $table->string('ttl', 191);
            $table->string('jk', 20);
            $table->string('kontak', 15);
            $table->string('avatar', 191)->nullable();
            $table->text('alamat');
            $table->string('pendidikan', 191)->nullable();
            $table->string('pekerjaan', 191)->nullable();
            $table->string('status', 191)->nullable();
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
        Schema::dropIfExists('peserta');
    }
}
