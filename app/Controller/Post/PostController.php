<?php

namespace Yukon\Controller\Post;

class PostController
{
    public function __construct()
    {
    }

    public function edit($id, $commentId)
    {
        echo json_encode(array('status' => 'This is "edit" method in the Post controller'));
    }

    public function update($id, $commentId)
    {
        echo json_encode(array('status' => 'This is "update" method in the Post controller'));
    }
}
