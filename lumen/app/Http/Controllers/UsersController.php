<?php


namespace App\Http\Controllers;

use App\Models\Users;

class UsersController extends Controller
{
    private string $_model = Users::class;

    use RESTActions;
}
