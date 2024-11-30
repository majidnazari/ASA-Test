<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiceRollController extends Controller
{
    public function roll()
    {
        $startTime = microtime(true);
        $rolls = 0;
        $spentTime = 0;
        $rollHistory = []; 
        usleep(1000);
        do {
            $dice1 = rand(1, 6); 
            $dice2 = rand(1, 6); 
            $rolls++;
            $spentTime = microtime(true) - $startTime; 
            
         
            $rollHistory[] = ['roll' => $rolls, 'dice1' => $dice1, 'dice2' => $dice2];
        } while ($dice1 != 6 || $dice2 != 6);
        
       
        return view('dice-roll', compact('rolls', 'spentTime', 'rollHistory'));
    }
}
