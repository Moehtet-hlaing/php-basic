<?php

function index () {
    $rows = get("SELECT * FROM batches lIMIT 10");
    return view('batch', ['batches' => $rows]);
};

function delete() {
    $id = $_GET['id'];
    if(runQuery("DELETE FROM batches WHERE id = $id")){
        redirect('/batch');
    }
};