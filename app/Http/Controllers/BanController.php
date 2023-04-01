<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function ban($id)
{
    $user = User::find($id);
    $user->status = 1 ;
    $user->save();
    return redirect()->back()->with('success', 'User has been banned.');
}
}
