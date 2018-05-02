<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(
            array(
                ['text'=>'General Director', 'rang'=>1],
                ['text'=>'General Director love', 'rang'=>2],
                ['text'=>'Zam Director', 'rang'=>3]
            )

        );

        DB::table('employees')->insert(
            array(
            'text'=>'Olexandr Honcharov', 'datestart'=>'2017-04-08', 'salary'=>'100000', 'position'=>DB::table('positions')->find(1)->text


        )
        );

        for ($i=2; $i<50000; $i++){
         $rand=rand(2, DB::table('positions')->count());//случайное число по количеству записей в таблице
                                                        //2 потому что 1 сотрудник всегда ген директор, который может быть только один

         $rand2=rand(1, DB::table('employees')->count());
            DB::table('employees')->insert(
                array(
                    'text'=>'Vasya pupkin'.$i, 'datestart'=>'2017-04-09', 'salary'=>rand(1000, 5000), 'position'=>DB::table('positions')->find($rand)->text, 'parent_id'=>DB::table('employees')->find($rand2)->id, 'boss'=>DB::table('employees')->find($rand2)->text
                )

            );
        }

    }
}
