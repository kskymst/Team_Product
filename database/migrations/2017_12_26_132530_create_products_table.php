<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // プライマリ
            $table->string('pro_name'); // 商品名
            $table->string('pro_name_en'); // 商品名（英語表記）
            $table->integer('pro_price'); // 価格（円）
            $table->string('pro_thumbnail'); // 画像
            $table->string('pro_genre'); // ジャンル
            $table->string('pro_author'); // 著者
            $table->string('pro_author_en'); // 著者english
            $table->string('pro_original_author'); // 原作者
            $table->string('pro_original_author_en'); // 原作者english
            $table->dateTime('pro_release_date'); // 発売日
            $table->string('pro_publisher'); // 出版社
            $table->string('pro_label'); // レーベル
            $table->text('pro_description'); // 商品詳細
            $table->string('pro_size'); // 書籍サイズ
            $table->integer('pro_weight'); // 書籍重量
            $table->integer('pro_stock'); // 在庫数
            $table->string('pro_isbn'); // ISBN_NO
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
        Schema::dropIfExists('products');
    }
}
