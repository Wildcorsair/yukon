<?php
namespace Yukon\Core\Fundation;

interface HTTPRequest
{
    public function getHeaders();
    public function getParameters();
}
