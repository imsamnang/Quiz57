<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaginationController extends Controller
{
	function index()
  {
    $data = DB::table('provinces')->paginate(1);
    return view('pagination', compact('data'));
  }

  function fetch_data(Request $request)
  {
    if($request->ajax())
    {
      $data = DB::table('provinces')->paginate(1);
      return view('pagination_data', compact('data'))->render();
    }
  }
}
