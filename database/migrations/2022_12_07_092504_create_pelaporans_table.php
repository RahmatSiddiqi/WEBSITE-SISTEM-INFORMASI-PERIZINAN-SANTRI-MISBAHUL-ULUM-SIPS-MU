<?php

use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(new Perizinan());
            $table->foreignIdFor(new User());
            $table->date('tgl_balik')->required();
            $table->enum('keterangan', ['Tepat Waktu', 'Tidak Tepat Waktu']);
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
        Schema::dropIfExists('pelaporans');
    }
}
