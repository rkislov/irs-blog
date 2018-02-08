<?php
/**
 * Created by PhpStorm.
 * User: 104
 * Date: 05.02.2018
 * Time: 8:38
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }
}