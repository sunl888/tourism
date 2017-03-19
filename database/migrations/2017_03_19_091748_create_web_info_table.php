<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_info', function(Blueprint $table){
            $table->increments('id');
            $table->string('name',20)->comment('网站标题');
            $table->string('copyright',40)->comment('版权信息');
            $table->string('case_number')->comment('网站备案号');
            $table->string('address')->comment('联系地址');
            $table->string('phone')->comment('联系电话');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
