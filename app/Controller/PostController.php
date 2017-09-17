<?php

namespace Yukon\Controller;

class PostController
{
    public function __construct()
    {
        echo 'This is Post controller<br>';
    }

    public function edit($id) {
        var_dump($id);
        var_dump($commentId);
        echo 'This is "edit" method in the Post controller<br>';
    }
}
