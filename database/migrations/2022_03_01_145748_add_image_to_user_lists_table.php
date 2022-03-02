<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_lists', function (Blueprint $table) {
            //カラム追加
            $table->string('file_name');
            $table->string('file_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_lists', function (Blueprint $table) {
            //カラム削除rollbackで消せる
            $table->dropColumn('file_name','file_path');
        });
    }
};
