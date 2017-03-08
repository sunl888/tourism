<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('图片的标题');
            $table->text('describe')->comment('描述');
            //$table->string('type')->default(0)->comment('图片的类型:0表示首页大图，1表示');
            $table->string('tags')->nullable()->comment('标签');
            $table->integer('user_id')->comment('作者');
            $table->string('url')->comment('图片地址');
            $table->softDeletes();
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
        Schema::dropIfExits('picture');
    }
}
