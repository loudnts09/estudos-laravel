<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });

        DB::statement('UPDATE site_contatos SET motivo_contato_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
        });

        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign(['motivo_contato_id']);
            $table->dropColumn('motivo_contato_id');
        });
    }
}
