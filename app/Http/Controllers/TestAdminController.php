<?php

namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestAdminController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request  $request, Helper $helper)
  {
    return Inertia::render(
      'Test'
    );
  }
}