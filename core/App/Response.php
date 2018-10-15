<?php
namespace Yukon\Core\App;

use Yukon\Core\Contracts\HTTPResponse;

/**
 *
 */
class Response implements HTTPResponse
{
    public function __construct($status = 200) {
        header("HTTP/1.0 {$status}");
    }

    public function header($key, $value = null)
    {
        header("{$key}: {$value}");
        return $this;
    }

    public function json($data)
    {
        echo json_encode($data);
    }
}
