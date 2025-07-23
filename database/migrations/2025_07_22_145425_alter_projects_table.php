<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rename existing columns
            $table->renameColumn('project_name', 'title');
            $table->renameColumn('project_description', 'description');
            $table->renameColumn('background_image_url', 'image');
            // Add link column (nullable)
            $table->string('link')->nullable()->after('image');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Reverse renaming
            $table->renameColumn('title', 'project_name');
            $table->renameColumn('description', 'project_description');
            $table->renameColumn('image', 'background_image_url');
            // Drop link column
            $table->dropColumn('link');
        });
    }
}
?>