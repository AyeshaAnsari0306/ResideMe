<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            
            // Define login_id column and make it a foreign key to users.login_id
            $table->string('login_id');
            $table->foreign('login_id')->references('login_id')->on('users')->onDelete('cascade');
            
            // Define email column and make it a foreign key to users.email
            $table->string('email');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            
            $table->text('message');  // Feedback message
            $table->enum('status', ['pending', 'reviewed', 'resolved'])->default('pending');
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
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign(['login_id']);
            $table->dropForeign(['email']);
        });
        Schema::dropIfExists('feedbacks');
    }
}
