<?php

namespace App\Http\Controllers;

use App\Entity\Menu\Services\MenuCommands;
use App\Entity\Menu\Services\MenuQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class MenuAdminController extends Controller
{
  public function index(MenuQueries $queries)
  {
    return Inertia::render(
      'Menu/Menu',
      [
        'pageTitle' => 'menu',
        'menuTreeArray' => $queries->getAllMenu()
      ]
    );
  }

  public function update(Request $request, MenuCommands $query) {
    $query->save($request->all());
    return Redirect::route('admin.menu');
  }
}
