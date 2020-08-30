<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableNewsParseAddCategoryUrlAdress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parse_news', function (Blueprint $table) {
            $table->string('category')->comment('Категория');
            $table->string('url_adress')->comment('Адрес ресурса');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parse_news', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('url_adress');
        });
    }
}
