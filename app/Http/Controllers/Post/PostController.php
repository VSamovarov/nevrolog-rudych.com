<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    const MAIN_PAGE_SLUG = 'main';
    const FOLDER_TEMPLATES = 'front.pages';
    const DEFAULT_PAGE_TEMPLATE_NAME = 'page';
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slug($slug='', PostQueries $queries)
    {
      if(empty($slug)) $slug = self::MAIN_PAGE_SLUG;
      return view($this->getTemplate($slug), ['main'=>$queries->getBySlug($slug)]);
    }

    /**
     * Возвращает темплейт
     *
     * @param string $slug
     * @return string
     */
    private function getTemplate(string $slug): string
    {
      $template =  self::FOLDER_TEMPLATES . '.' . self::DEFAULT_PAGE_TEMPLATE_NAME;
      if(View::exists(self::FOLDER_TEMPLATES . '.' . $slug)) {
        $template = self::FOLDER_TEMPLATES . '.' . $slug;
      }
      return $template;
    }
}