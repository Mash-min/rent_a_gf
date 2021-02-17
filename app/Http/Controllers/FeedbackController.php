<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Girlfriend;

class FeedbackController extends Controller
{
  public function create(Request $request)
  {
    $feedback = auth()->user()->feedbacks()->create($request->all());
    return response()->json([
      'feedback' => $feedback,
      'user' => $feedback->user->first()
    ]);
  }

  public function girlfriendFeedbackJSON($id)
  {
    $girlfriend = Girlfriend::find($id);
    $feedbacks = $girlfriend->feedbacks()->with('user')->paginate(5);

    return response()->json([
      'feedbacks' => $feedbacks
    ]);
  }
}
