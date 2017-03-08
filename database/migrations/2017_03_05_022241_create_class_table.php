<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('title',5);
            $blueprint->integer('sort')->default(0);
            $blueprint->integer('is_top_menu')->default(1)->comment('是否是顶级菜单');
            $blueprint->integer('parent_id')->default(0)->comment('父级id，默认是顶级菜单，父级id为0');
            $blueprint->string('url')->comment('栏目链接');
            $blueprint->softDeletes();
            $blueprint->timestamps();
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
