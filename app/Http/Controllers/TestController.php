<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    //
    public function test1(){
        phpinfo();
    }

    public function test2(Request $request,$arg1,$arg2){
        echo $arg1;
        echo $arg2;
    }

    //add方法
    public function add(){
        //insert 方法
        $res=DB::table('user')->insert([
            [
                'name'=>'陈柯赞',
                'sex'=>1
            ],
            [
                'name'=>'陈小明',
                'sex'=>2
            ]
        ]);
        $res=DB::table('user')->insertGetId([
            'name'=>'王五',
            'sex'=>2
        ]);
        //dump($res);
        echo 1;
    }

    public function mod(){
        $res=DB::table('user')->where('id',1)->update([
            'name'=>'张三丰'
        ]);
        //dump($res);
        $res=DB::table('user')->where('id',1)->increment('sex');//每次加1
        dump($res);
    }

    public function select(){
        $db=DB::table('user');
        $data=$db->get();//获取user表中所有的数据
        foreach ($data as $key =>$value){
            echo "id是：{$value->id}，名字是：{$value->name}";
        }
        echo PHP_EOL;
        #获取id<3的数据
        #$res=$db->where('id','<',3)->get();
        #dump($res);
        #取出单行数据
        #$res=$db->where('id',1)->first();
        #dump($res);
        #获取某个具体的值（一个字段）
        #$res=$db->where('id',1)->value('name');
        #dump($res);
        #获取多个字段
        #$res=$db->select('name','sex')->get();
        #dump($res);

        #排序操作
        #$res=$db->orderBy('sex','desc')->get();
        #dump($res);

        #分页操作
        $res=$db->limit(2)->offset(2)->get();
        dump($res);
    }
}
