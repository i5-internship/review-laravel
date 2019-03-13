<?php

function message_success($data)
{
    return [
        'message' => 'success',
        'code' => 200,
        'data' => $data
    ];
}
