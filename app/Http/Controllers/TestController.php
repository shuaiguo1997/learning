<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Teacher;
use App\Services\TestService;
use DB;
use Cache;
use Captcha;
use Session;
use Crypt;

class TestController extends Controller{


    public function Tests(){
        echo 'my name is guojun';
    }

    //在控制中添加
    public function add($name){
        $res = DB::table('test')->insert(['name'=>$name,'age'=>'20','createtime'=>date('Y-m-d')]);
        return $res;
    }

    public function edit($id,$name){
        $res = DB::table('test')->where('id',$id)->update(['name'=>$name]);
        return $res;
    }

    public function lists(){
        $list = DB::table('test')->paginate(1);
        // dd($list);
        return view('test',compact('list'));
    }



    public function del($id){
        $res = DB::table('test')->where('id',$id)->delete();
        return $res;
    }

    //调用模型添加
    public function inserts(){
        $model = new Test();
        $gg = $model->add();
        if($gg){
            return view('test',compact('gg'));
        }
        return view('gg思密达');

    }

    //调用模型查询
    public function selects(){
        $model = new Test();
        $list = $model->selected();
        return view('test',compact('list'));
    }

    //调用模型修改
    public function updateed($id,$name){
        $model = new Test();
        // $data = $request->input();
        // dump($id);die;
        $gg = $model->updates($id,$name);
        if($gg){
            return view('test',compact('gg'));
        }
        return view('gggg');
    }

    public function deleteed($id){
        $model = new Test();
        $gg = $model->deletes($id);
        if($gg){
            return view('test',compact('gg'));
        }else{
            $gg = '修改失败';
            return view('test',compact('gg'));
        }
    }

    public function formtests(){
        return view('formtest');
    }

    public function formvalidate(Request $request){
        $this->validate($request,[
            'name' => 'required|min:2|max:30',
            'age' => 'required|min:1|integer',
            'captcha' => 'required|Captcha',
        ]);
        return view('formtest');
    }

    public function huancun(){
        //缓存在storage/framework/cache/data里面
        // $res = Cache::put('ces1','缓存测试1',500);
        // $res = Cache::add('ces2','缓存测试2',200);
        // $res = Cache::forever('ces3', '缓存测试3');
        // $res = Cache::flush();
        // $res = Cache::get('ces1');
        // $res = Cache::has('ces3');
        // $res = Cache::pull('ces2');
        // $res = Cache::increment('ces4', 1);
        // $res = Cache::decrement('ces4', 2);
        // $res = Cache::remember('ces5', 600, function () {
        //     return 7;
        // });
        return $res;
    }

    //链表查询
    public function selectjoin(){
        $model = new Teacher;
        $data = $model->index();
        $DATA = json_encode($data,JSON_UNESCAPED_UNICODE);
        return $DATA;
    }

    //测试session
    public function sessiontest(){
        //设置session
        // $res = session::put('keys','shuaiguo');
        //获取session
        // $res = session::get('keys','12345');
        //session没有变量并返回
        // $res = session::get('key1',function(){
        //     return 1;
        // });
        //获取session所有的变量
        // $res = session::all();
        //删除session
        // $res = session::forget('keys');
        //清空所有的session
        // $res = session::flush();
        //判断session是否存在
        // $res = session::has('keys');
        return $res;
    }

    //一对一，一对多,多对多模型
    public function hasmodel(){
        $model = new teacher;
        // return $model->index1();
        return $model->index2();
    }

    //加密
    public function crypt_test(){
        // $res = DB::table('teacher')->insert(
        //     [
        //         't_name'=>'CES1',
        //         'password'=>Crypt::encryptString('123456')
        //     ]
        // );

        $res_data = DB::table('teacher')->get()->toArray();
        // foreach ($res_data as $key => $value) {
        //     $res_data[$key]['password'] = crypt::decryptString($value['password']);
        // }
        return $res_data;
    }

    //集合
    public function jihe(){
        //算平均值
        $data1 = collect(['1','2','3'])->avg();
        // return $data1;
        //插入集合
        $data2 = collect(['1','2','3'])->concat(['guojun']);
        // return $data2->all();
        //判定集合是否包含值，不判断键
        $data3 = collect(['1','2','3','4']);
        $data3 = collect(['one'=>'1','two'=>'2','three'=>'3']);
        // dd($data3->contains('1'));
        //判断集合有多少值
        $data4 = collect(['one'=>'1','two'=>'2','three'=>'3']);
        // dd($data4->count());
        //判断值出现的次数
        $data5 = collect([1,2,3,4,4,4,5,5,6,7,8,8,8,8,9,9])->countby();
        // dd($data5->all());
        //diffKeys 方法和另外一个集合或 PHP 数组的键（keys）进行比较，然后返回原集合中存在而指定集合中不存在键所对应的键 / 值对
        $collection = collect([
            'one' => 10,
            'two' => 20,
            'three' => 30,
            'four' => 40,
            'five' => 50,
        ]);
        $diff = $collection->diffkeys([
            'one' => 10,
            'three' => 30,
            'four' => 40,
            'five' => 50,   
        ]);
        // dd($diff->all());
        //duplicates 方法从集合中检索并返回重复的值
        $data6 = collect([1,1,1,2,2,3,4]);
        // dd($data6->duplicates());
        // [1 => 1,2 => 1, 4 => 2];
        //first  方法返回集合中通过指定条件测试的第一个元素：
        $data7 = collect([1,2,3,4,5,36])->first(function($val){
            return $val > 3;
        });
        // dd($data7);//4
        //flatten 方法将多维集合转为一维集合：
        $data8 = collect(['one'=>1,'two'=>2,'three'=>['I','love','you']]);
        $flatten = $data8->flatten();
        // dd($flatten);
        // forget 方法将通过指定的键来移除集合中对应的元素：
        $data9 = collect(['one'=>1,'two'=>2,'three'=>['I','love','you']]);
        $forget = $data9->forget('three');
        // dd($forget);
    }

    public function TestProviders(){
        $test = app()->make('TestContracts');
        $infos = $test->say('雅是拉，poor gay');
        return $infos;
    }
}
