<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('test');
});*/
Route::get('/',function (){
    return 'hello world!';
});
Route::get('home/{id}',function ($id){
    echo '输入的id是'.$id;
    return '您当前访问的是/home地址';
});
Route::get('home2/{id?}',function ($id=0){
    return '您当前访问的是/home2地址，您传入的id值是'.$id;
});
#还支持传统的路由参数传递
Route::any('home3',function (){
    $id=isset($_GET['id'])?$_GET['id']:0;
    return '您当前访问的是/home3地址，您传入的id是'.$id;
})->name('h1');

Route::group(['prefix'=>'admin'],function (){
    Route::get('login',function (){
        return '群组login';
    });
    Route::get('logout',function (){
        return '群组logout';
    });
});
#Route::get('test1','TestController@test1');#Laravel6/7路由配置
/*Route::get('test1',[\App\Http\Controllers\TestController::class,'test1']);//Laravel8路由配置方式
Route::get('test2/{param1}/{param2}',[\App\Http\Controllers\TestController::class,'test2']);
Route::get('add',[\App\Http\Controllers\TestController::class,'add']);
Route::get('mod',[\App\Http\Controllers\TestController::class,'mod']);
Route::get('select',[\App\Http\Controllers\TestController::class,'select']);*/
