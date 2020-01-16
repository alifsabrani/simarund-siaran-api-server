<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaDaerahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $table = 'berita_daerah';
    public function up()
    {
        Schema::create('berita_daerahs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('judul');
            $table->int('durasi');
            $table->int('id_dubber');
            $table->int('id_penterjemah');
            $table->string('tanggal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_daerahs');
    }
}
