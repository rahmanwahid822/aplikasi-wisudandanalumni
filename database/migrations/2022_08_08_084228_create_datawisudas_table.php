<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatawisudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datawisudas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bukti_lunasijazahwisuda')->nullable();
            $table->string('bukti_pembayaranperpus')->nullable();
            $table->string('bukti_sumbanganalumni')->nullable();
            $table->string('bukti_fototigaempat')->nullable();
            $table->string('bukti_fotoduatiga')->nullable();
            $table->string('bukti_empatenam')->nullable();
            $table->string('bukti_laporanta')->nullable();
            $table->string('bukti_laporanpkn')->nullable();
            $table->string('bukti_linkta')->nullable();
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
        Schema::dropIfExists('datawisudas');
    }
}
