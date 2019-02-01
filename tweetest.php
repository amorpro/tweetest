<?php
/**
 * Created by PhpStorm.
 * User: AmorPro
 * Date: 02.02.2019
 * Time: 0:57
 */

function it($m,$p){ $d=debug_backtrace(0)[0];is_callable($p) and $p=$p();global $e;$e=$e||!$p;$o=($p?"✔":"✘")." It $m";
fwrite($p?STDOUT:STDERR,$p?"$o\n":"$o FAIL: {$d['file']} #{$d['line']}\n");}
register_shutdown_function(function(){global $e; $e and die(1);});