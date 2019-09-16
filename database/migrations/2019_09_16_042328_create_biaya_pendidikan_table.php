<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiayaPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jml_peserta', 191);
            $table->string('dekat', 20);
            $table->string('jauh_malam', 20);
            $table->string('jauhdanmalam', 20);
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
        Schema::dropIfExists('biaya_pendidikan');
    }
}
