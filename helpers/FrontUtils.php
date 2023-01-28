<?php

function flashSucces($msg) {
    return [
        'message' => $msg,
        'alert-type' => 'success'
    ];
}

function flashFailed($msg) {
    return [
        'message' => $msg,
        'alert-type' => 'danger'
    ];
}

function flashWarning($msg) {
    return [
        'message' => $msg,
        'alert-type' => 'warning'
    ];
}

function flashInfo($msg) {
    return [
        'message' => $msg,
        'alert-type' => 'info'
    ];
}

