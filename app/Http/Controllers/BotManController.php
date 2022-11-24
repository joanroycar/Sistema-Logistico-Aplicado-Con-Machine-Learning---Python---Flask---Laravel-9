<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;

class BotManController extends Controller
{
    
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
  
            if ($message == 'hi') {
                $this->askName($botman);
            }else if($message == 'joan'){
                $this->joanName($botman);

            }else{
                $botman->reply("write 'hi' for testing...");
            }
  
        });
  
        $botman->listen();
    }

    public function joan(){
        $juan= User::select('name')->where('id','1')->get();


        return $juan;
    }
    public function juan(){
        return 'JOAN';
    }

    public function joanName($botman)
    {
        $botman->ask('Esta seguro?', function(Answer $answer) {
           
            // $name = $answer->getText();
            $juan= User::all()->count();
            $nombrepru= auth()->user()->name;

            $this->say('Nice to meet you '.'    '. $juan.'    '.$nombrepru);
        });
    }


  
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
           
            $name = $answer->getText();
            $juan= User::all()->count();
            $nombrepru= auth()->user()->name;

            $this->say('Nice to meet you '. $name.'    '. $juan.'    '.$nombrepru);
        });
    }
}
