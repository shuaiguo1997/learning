<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    protected $table = 'student';

    public $timestamps = false;

    public function index(){
        $res = $this->select('a.id','b.t_id','a.t_name','b.s_name')->leftjoin('student as b','a.id','=','b.t_id')->get();
        return $res;
    }

    
}