<?php
/**
 * Created by PhpStorm.
 * User: AmorPro
 * Date: 02.02.2019
 * Time: 0:57
 */

function it($m,$p){ $d=debug_backtrace(0)[0];$t=microtime(true);is_callable($p) and $p=$p();$t=microtime(true)-$t;
    global $e;$e=$e||!$p;$o="\t\033[3" . ($p?"2m+":"1m-")." It $m";echo ($p?"$o (".round($t, 3).'s)':"$o ({$d['file']} #{$d['line']})") . "\e[0m\n";}
register_shutdown_function(function(){global $e; $e and die(1);});

function scenario($c, array $d){
    is_callable($c) or die('Scenario must be callable');
    foreach($d as $k => $v){ echo "  $k\n";call_user_func_array($c, $v);}
}

function tweerun($d='./tests'){
    foreach(scandir($d) as $f){
        $p=$d.DIRECTORY_SEPARATOR.$f;
        if(!is_dir($p)) { $s=basename(dirname($p));echo "\n".($s!='tests'? $s.' | ' : '') . $f .str_repeat('-', 60-strlen($f))."\n";
            include_once $p;}
        elseif(!in_array($f,['.','..'])) { tweerun($p); }
    }
}
