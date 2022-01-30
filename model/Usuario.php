<?php
class Usuario{
    var $id;
    var $nome;
    var $login;
    var $senha;

    function SetId($Id){
        $this->id = $Id;
    }

    function GetId(){
        return $this->id;
    }
}