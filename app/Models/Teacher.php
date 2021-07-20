<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    protected $table = 'teacher';

    public $timestamps = false;

    public function student(){
        return $this->hasMany('App\Models\Student','t_id','id');
    }

    public function relationship(){
        return $this->belongstoMany('App\Models\Course','relationship','t_id','c_id');
    }

    public function index(){
        $res = $this->select('a.id','b.t_id','a.t_name','b.s_name')->leftjoin('student as b','a.id','=','b.t_id')->get();
        return $res;
    }

    public function index1(){
        $data = $this->get();
        foreach($data as  $val){
            echo '教师名称：'.$val->t_name.'<br />';
            foreach($val->student as $value){
                echo '学生名称：'.$value->s_name.'<br />';
            }
        }
        // echo $data;
    }

    public function index2(){
        $data = $this->get();
        foreach($data as  $val){
            echo '教师名称：'.$val->t_name.'<br />';
            foreach($val->relationship as $value){
                echo '课程名称：'.$value->class_name.'<br />';
            }
        }
    }


}
