<?php
namespace Yukon\Core\Fundation;

interface HTTPRequest
{
    public function headers($name);
    public function get($name);
}
