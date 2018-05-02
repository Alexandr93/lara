<?php

namespace App\Http\Controllers;


use App\Employee;
use Illuminate\Http\Request;

class PossController extends Controller
{
    function index(){

        $sotr=Employee::all();
        return view('sotrudniki',compact('sotr'));

    }

    function fixTree()
    {

        echo "Обновление дерева";
        Employee::fixTree();
        $sotr = Employee::get()->toTree();//json для построения дерева
        $arr=str_split($sotr, 50000);//разбиваю на куски чтобы записывало в файл
        $count=count($arr);
        echo $count;
        unlink($_SERVER['DOCUMENT_ROOT'] . '/tsconfig.json');
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/tsconfig.json', "a");
        for($i=0; $i<$count; $i++){
            fwrite($fp, $arr[$i]);
        }
            fclose($fp);

    }
    function editPoss(){




        return view('newvi', compact('sotr'));


    }

    function deleteTree(){

        unlink($_SERVER['DOCUMENT_ROOT'] . '/tsconfig.json');
    }
}
