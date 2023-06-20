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
        Schema::table('department_project', function (Blueprint $table) {
            $table->foreign(['department_id'], 'department_project_ibfk_1')->references(['id'])->on('departments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['project_id'], 'department_project_ibfk_2')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_project', function (Blueprint $table) {
            $table->dropForeign('department_project_ibfk_1');
            $table->dropForeign('department_project_ibfk_2');
        });
    }
};
