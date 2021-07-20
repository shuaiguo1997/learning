<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    protected $table = 'test';

    public $timestamps = false;

    public function add(){
        $res = $this->insert(['name'=>'GG','age'=>'20','createtime'=>date('Y-m-d')]);
        return $res;
    }

    public function selected(){
        return $this->get();
    }

    public function updates($id,$name){
        $res = $this->where('id',$id)->update(['name'=>$name]);
        return $res;
    }

    public function deletes($id){
        $res = $this->where('id',$id)->delete();
        return $res;
    }
}