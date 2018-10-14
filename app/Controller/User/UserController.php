<?php

/**
 * Example controller for working with user.
 */

namespace Yukon\Controller\User;

use Yukon\Controller\Controller;
use Yukon\Core\App\Request;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'Show ALL Users';
    }

    public function show($id)
    {
        echo 'Show SINGLE User: ' . $id;
    }

    public function create()
    {
        echo 'Create User';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id;
    }

    public function update($id)
    {
        echo 'Update User: ' . $id;
    }

    public function delete($id)
    {
        echo 'Delete User: ' . $id;
    }
}
