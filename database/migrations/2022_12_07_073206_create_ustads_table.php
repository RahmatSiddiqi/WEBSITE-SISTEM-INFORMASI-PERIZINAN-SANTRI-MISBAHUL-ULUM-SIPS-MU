<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustads', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50)->required();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->required();
            $table->date('tgl_lahir')->required();
            $table->string('tempat_lahir', 50)->required();
            $table->string('alamat', 100)->required();
            $table->string('jabatan', 50)->required();
            $table->string('no_telepon');
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
        Schema::dropIfExists('ustads');
    }
}
