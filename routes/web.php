<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckLong;
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
Route::get('Tests',[TestController::class,'Tests']);

Route::get('add/name/{name}',[TestController::class,'add']);

Route::get('edit/id/{id}/name/{name}',[TestController::class,'edit']);

Route::get('del/id/{id}',[TestController::class,'del']);

Route::get('lists',[TestController::class,'lists']);

Route::get('welcome',function(){
    return phpinfo();
});

Route::match(['post','get'],'match',function(){
    echo "match";
});
Route::any('any',function(){
    echo "牛逼";
});

//表单验证
Route::get('formtests',[TestController::class,'formtests']);
Route::get('formvalidate',[TestController::class,'formvalidate']);

//必选参数
Route::get('bixuan/{id}',function($id){
    echo 'I LOVE YOU '.$id;
});

//可选参数
Route::get('kexuan/{id?}',function($id=''){
    echo "I love you ".$id;
});

//路由的分组
Route::prefix('admin/admin1')->group(function(){
    Route::get('a',function(){
        echo '11211121212';
    });
    Route::get('b',function(){
        echo 'ffffff';
    });
});

Route::get('add',[TestController::class,'inserts']);

Route::get('list',[Testcontroller::class,'selects']);

Route::get('updates/id/{id}/name/{name}',[TestController::class,'updateed']);

Route::get('deleteed/id/{id}',[TestController::class,'deleteed']);

Route::get('huancun',[TestController::class,'huancun']);

Route::get('selectjoin',[TestController::class,'selectjoin']);

Route::get('sessiontest',[TestController::class,'sessiontest']);

Route::get('hasmodel',[Testcontroller::class,'hasmodel']);

Route::get('middlewares/{long}',function(){
     return '你的长比200长';
})->middleware(CheckLong::class);

//加密
Route::get('crypt_test',[TestController::class,'crypt_test']);

//集合
Route::get('jihe',[TestController::class,'jihe']);

//服务容器
Route::get('rongqi',[TestController::class,'TestProviders']);