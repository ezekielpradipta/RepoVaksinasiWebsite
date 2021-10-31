<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pasien;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nomordaftar');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('nohp');
            $table->unsignedBigInteger('vaksin_id');
            $table->enum('validasi',['1','0'])->default('0');
            $table->timestamps();
            $table->foreign('vaksin_id')->references('id')->on('vaksins')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
