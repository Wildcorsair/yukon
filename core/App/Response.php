<?php
namespace Yukon\Core\App;

use Yukon\Core\Contracts\HTTPResponse;

/**
 *
 */
class Response implements HTTPResponse
{
    public function __construct()
    {
        //
    }

    public function json($data)
    {
        $this->setResponseHeaders();
        echo json_encode($data);
    }

    public function setResponseHeaders()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header('Access-Control-Allow-Methods: POST, GET, PUT, PATCH, DELETE, OPTIONS');
    }
}
