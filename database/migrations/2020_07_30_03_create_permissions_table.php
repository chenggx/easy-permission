<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('pid')->default(0)->comment('父权限 id');
            $table->string('title')->default('')->comment('权限名称-中文标示');
            $table->string('name')->default('')->comment('路由名称-大驼峰');
            $table->unsignedTinyInteger('type')->default(0)->comment('权限类型，1-分组、2-页面、3-按钮');
            $table->unsignedInteger('order')->default(0)->comment('排序');
            $table->string('icon')->nullable()->comment('图标');
            $table->string('method')->nullable()->comment('api 方法');
            $table->string('api')->nullable()->comment('api 地址');
            $table->boolean('hidden')->default(false)->comment('是否隐藏');
            $table->timestamps();

            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
