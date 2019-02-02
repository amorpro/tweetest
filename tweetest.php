<?php
/**
 * Created by PhpStorm.
 * User: AmorPro
 * Date: 02.02.2019
 * Time: 0:57
 */

function it($m,$p){ $d=debug_backtrace(0)[0];is_callable($p) and $p=$p();global $e;$e=$e||!$p;
    $o="\033[3" . ($p?"2m✔":"1m✘")." It $m";echo ($p?"$o":"$o FAIL: {$d['file']} #{$d['line']}") . "\e[0m\n";}
register_shutdown_function(function(){global $e; $e and die(1);});

function scenario($c, array $d){
    is_callable($c) or die('Scenario must be callable');
    foreach($d as $k => $v){ echo "$k\n";call_user_func_array($c, $v);}
}

function tweerun($d='./tests'){
    foreach(scandir($d) as $f){
        $p=$d.DIRECTORY_SEPARATOR.$f;$n="\n";$de=str_repeat('-', 50);
        if(!is_dir($p)) { echo $n.$de.$n.$f.$n.$de.$n;include_once $p;}
        elseif(!in_array($f, ['.','..'])) { tweerun($p); }
    }
}
