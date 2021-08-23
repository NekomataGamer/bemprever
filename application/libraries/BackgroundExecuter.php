<?php

class BackgroundExecuter {

    function handle($controller, $method) {
        $CI = &get_instance();
        $command = "php ".FCPATH."index.php $controller $method";
        $CI->model->insere('logs_internos', [
            'log' => $command
        ]);
        shell_exec($command);
    }
}