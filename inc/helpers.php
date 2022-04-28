<?php

function pre($array){

}

function validate_input($input){
    $input = stripslashes(trim($input));
    $input = htmlentities($input,ENT_QUOTES);
    return $input;
}