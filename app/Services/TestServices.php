<?php
namespace App\Services;
use App\Contracts\TestContracts;

class TestServices implements TestContracts{

    public function say($info){
        echo $info;
    }
    
}