<?php
namespace Yukon\Core\Contracts;

interface HTTPResponse
{
    public function json($data);
    public function content($data);
}
