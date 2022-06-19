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
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('status')->default(config('settings.status.inactive'));
            $table->longText('summary')->fulltext()->nullable();
            $table->longText('content')->fulltext()->nullable();
            $table->string('featured_image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
};
