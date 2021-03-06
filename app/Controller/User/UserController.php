<?php

/**
 * Example controller for working with user.
 */

namespace Yukon\Controller\User;

use Yukon\Controller\Controller;
use Yukon\Core\App\Request;
use Yukon\Core\App\Response;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return (new Response())->header('Content-Type', 'application/json')->json(['id' => 1, 'name' => 'John']);
    }

    public function show(Request $request, $id)
    {
        // echo $request->headers('Authorization');
        return (new Response(401))->content("Show SINGLE User: {$id}");
    }

    public function create(Request $request)
    {
        echo $request->headers('Content-Type');
        echo $request->email;
        echo 'Create User';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id;
    }

    public function update(Request $request, $id)
    {
        echo 'Update User: ' . $id;
    }

    public function delete($id)
    {
        echo 'Delete User: ' . $id;
    }
}
