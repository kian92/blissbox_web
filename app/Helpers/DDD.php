<?php

namespace app\Helpers;

class DDD {
    public static function ddd(...$args){
        http_response_code(500);
        call_user_func_array('dd', $args);
    }
}
?>