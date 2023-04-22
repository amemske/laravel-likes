<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//autoincrementing
           // $table->integer('user_id')->unsigned()->index();//many posts belong to a user, index is for speed in the db
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //cascade means also delete the relationships 
            $table->text('body');
            $table->timestamps();//created_at //updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
