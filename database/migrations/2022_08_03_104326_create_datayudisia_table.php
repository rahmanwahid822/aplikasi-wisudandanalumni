<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatayudisiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datayudisia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bukti_perpus');
            $table->string('bukti_revisi');
            $table->string('bukti_legalijazah');
            $table->string('bukti_legalkk');
            $table->string('bukti_akta');
            $table->string('bukti_khs');
            $table->string('bukti_pkn');
            $table->string('bukti_ta');
            $table->string('bukti_linkta');
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
        Schema::dropIfExists('datayudisia');
    }
}
