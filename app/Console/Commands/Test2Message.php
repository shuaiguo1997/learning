<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test2Message extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:secondmessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->info('I love you');
        $name = $this->ask('what is your name');
        $age = $this->choice('how old are you',['10','20','30'],'10');
        $password = $this->secret('what is your password');
        if($password!='123456'){
            $this->info('your password is'.$password);
            $this->error('password error');
            exit(-1);
        }

        if($this->confirm('are you sure')){
            $this->info('your name is '.$name.' and age is '.$age);
        }else{
            exit(0);
        };
    }
}
