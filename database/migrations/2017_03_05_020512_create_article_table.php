<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('文章标题');
            //todo 这里的slug需要添加唯一索引
            $table->string('slug')->comment('slug')->unique;
            $table->string('class_id')->comment('文章类型');
            $table->integer('user_id')->comment('作者');
            $table->string('tags')->nullable()->comment('tag');
            $table->integer('status')->default(0)->comment('文章的状态:1-已审核，0-待审核，-1-审核不通过');
            $table->integer('views')->default(0)->comment('文章浏览量');
            $table->string('source')->default('原创文章')->comment('文章来源');
            $table->integer('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('articles');
    }
}
