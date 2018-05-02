<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employees';

    /**
     * Run the migrations.
     * @table employees
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('text', 45);

            $table->date('datestart')->nullable();
            $table->string('salary', 45)->nullable();
            $table->string('position', 45)->nullable();
            $table->string('boss', 45)->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('_lft')->nullable();
            $table->integer('_rgt')->nullable();
            $table->integer('depth')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->index(["boss", "parent_id"], 'fk_boss_idx');

            $table->index(["text"], 'nameind');

            $table->index(["position"], 'fk_posit_idx');


            $table->foreign('position', 'fk_posit_idx')
                ->references('text')->on('positions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('boss', 'fk_boss_idx')
                ->references('text')->on('employees')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
