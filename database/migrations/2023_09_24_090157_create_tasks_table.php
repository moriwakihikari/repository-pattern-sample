<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id')->comment('タスクID');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id')->comment('カテゴリID');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name', 100)->comment('タスク名');
            $table->boolean('status')->default(false)->comment('タスク状況');
            $table->text('content')->comment('タスク詳細');
            $table->timestamp('created_at')->useCurrent()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
            $table->comment('タスクテーブル');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
