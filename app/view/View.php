<?php
namespace view;

class View{
    public function makeView($view, $DBdata = null, $DBdataToo = null, $who = null, $timer = null){
        include __DIR__.'/views/'.$view.'-view.php';
    }
}