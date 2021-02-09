<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\Models\Girlfriend;

class TagsController extends Controller
{
  public function create(Request $request)
  {
  	$tag = Tags::create([
  		'tag' => $request->tag,
  		'girlfriend_id' => $request->girlfriend_id
  	]);
  	return response()->json($tag);
  }

  public function update(Request $request, $id)
  {
  	$girlfriend = Girlfriend::findOrFail($id);
  	if ($request->has('tags')) {
  		$girlfriend->tags()->delete();
  		foreach ($request->tags as $tag) {
	  		$saveTags = Tags::create([
	  			'tag' => $tag,
	  			'girlfriend_id' => $id
	  		]);
	  	}
  	}
  }

}
