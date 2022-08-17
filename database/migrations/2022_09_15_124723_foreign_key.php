<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
        });
        Schema::table('post_tags', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained('posts', 'id');
            $table->foreignId('tag_id')->constrained('tags', 'id');
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
};
