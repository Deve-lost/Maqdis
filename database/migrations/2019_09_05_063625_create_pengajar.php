<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('nm_pengajar', 50);
            $table->string('pendidikan', 191);
            $table->string('kontak', 15)->unique();
            $table->string('jk', 20);
            $table->string('ttl', 191);
            $table->string('pengalaman_kerja', 191);
            $table->text('alamat');
            $table->string('avatar', 191);
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
        Schema::dropIfExists('pengajar');
    }
}
