<?php
namespace Yukon\Core\Contracts;

interface HTTPRequest
{
    public function headers($name);
    public function get($name);
}
