<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('short_description');
            $table->longText('description')->nullable();
            $table->string('project_picture')->nullable();
            $table->enum('status',[
                \App\Project::REVISION,
                \App\Project::PREAPPROVAL,
                \App\Project::APPROVAL,
                \App\Project::PUBLISHED,
                \App\Project::REJECTED
            ])->default(\App\Project::REVISION);
            $table->mediumText('iframe_video')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->double('price');
            $table->string('slug'); //ES LA URL AMIGABLE
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('type_categories_id');
            $table->foreign('type_categories_id')->references('id')->on('type_categories');
            $table->integer('quantity')->default(1);
            $table->string('group_name')->default(null);
            $table->boolean('previous_approved')->default(false);
            $table->boolean('previous_rejected')->default(false);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
