<?php

/**
 * Example controller for working with user.
 */

namespace Yukon\Controller\User;

use Yukon\Controller\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo 'This is User controller<br>';
    }

    public function index()
    {
        echo 'Show ALL Users<br>';
    }

    public function show($id)
    {
        echo 'Show SINGLE User: ' . $id . '<br>';
    }

    public function create()
    {
        echo 'Create User<br>';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id . '<br>';
    }

    public function update($id)
    {
        echo 'Update User: ' . $id . '<br>';
    }

    public function delete($id)
    {
        echo 'Delete User: ' . $id . '<br>';
    }
}
