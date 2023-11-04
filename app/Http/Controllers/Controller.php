<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use View;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function __construct() {

        $current_date = Carbon::parse('2021-02-01'); // yyyy-mm-dd

        View::share ( 'current_date', $current_date );
    }
    
    protected function debugToConsole($msg) { 
        echo "<script>console.log(".json_encode($msg).")</script>";
    }
}
