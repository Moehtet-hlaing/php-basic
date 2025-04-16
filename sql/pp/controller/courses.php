<?php 


function index (){
    $rows = get("SELECT * FROM courses lIMIT 10");
    // print_r($rows);
    header('Content-Type: application/json');
    echo json_encode($rows);
};

function store (){

};

function delete (){

};