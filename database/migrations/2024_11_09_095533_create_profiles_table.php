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
    // name と gender と hobby と introduction と image_path を追記
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // プロフィールの名前を保存するカラム
            $table->string('gender');  // プロフィールの性別を保存するカラム
            $table->string('hobby'); // プロフィールの趣味を保存するカラム
            $table->string('introduction');  // プロフィールの自己紹介を保存するカラム
            $table->string('image_path')->nullable();  // 画像のパスを保存するカラム
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
        Schema::dropIfExists('profile');
    }
};
