<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
  public function notificationJSON()
  {
    $notifications = auth()->user()->notifications()->paginate(10);
    return response()->json(['notifications' => $notifications]);
  }
}
