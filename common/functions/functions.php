<?php
use yii\helpers\VarDumper;
/**
 * Created by PhpStorm.
 * Глобальные функции-помощники
 */
/**
 * Выводит значение переменной
 * Пример: dump($var);
 */
if(!function_exists('dump')){
    function dump($var, $depth = 10, $highlight = true){
        VarDumper::dump($var, $depth, $highlight);
    }
}
/**
 * Выводит значение переменных
 * Пример: d($var, $var1, ...);
 */
if(!function_exists('d')){
    function d(){
        array_map(function ($x){
            VarDumper::dump($x, 10, true);
        }, func_get_args());
    }
}
/**
 * Выводит значение переменных и прекращает работу программы
 * Пример: dd($var, $var1, ...);
 */
if(!function_exists('dd')){
    function dd(){
        array_map(function ($x){
            VarDumper::dump($x, 10, true);
        }, func_get_args());
        die;
    }
}