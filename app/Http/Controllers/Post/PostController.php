<?php

namespace App\Http\Controllers\Post;

use App\Entity\Post\Services\PostQueries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    const MAIN_PAGE_SLUG = 'main';
    const FOLDER_TEMPLATES = 'front.pages';
    const DEFAULT_PAGE_TEMPLATE_NAME = 'page';
    const DEFAULT_INDEX_TEMPLATE_NAME = 'index';
    const DEFAULT_POST_TEMPLATE_NAME = 'post-single';

    public function slug($slug='', PostQueries $queries)
    {
      if(empty($slug)) $slug = self::MAIN_PAGE_SLUG;
      $main = $queries->getBySlug($slug);
      return view(
        $this->getTemplate($slug, self::DEFAULT_PAGE_TEMPLATE_NAME),
        compact('main')
      );
    }

    public function index($type, Request $request, PostQueries $queries)
    {
      $per_page = null;
      if($type === 'faq') $per_page = 100;
      $items = $queries->index( array_merge($request->all(),['status'=>'publish', 'type'=>$type ]), $per_page);
      $main = $queries->getBySlug($type);
      return view(
        $this->getTemplate($type, self::DEFAULT_INDEX_TEMPLATE_NAME),
        compact('items','main')
      );
    }

    public function show($type, $slug,  Request $request, PostQueries $queries)
    {
      $main = $queries->getBySlug($slug);
      /**
       * Тут можно реализовать функционал редиректа на правильный $slug
       * если $slug и $main->translateOrDefault()->slug не совпадают
       */
      $type_data = $queries->getBySlug($type);
      return view(
        $this->getTemplate("{$type}-post", self::DEFAULT_POST_TEMPLATE_NAME),
        compact('main','type_data')
      );
    }

    /**
     * Возвращает темплейт
     *
     * @param string $slug
     * @return string
     */
    private function getTemplate(string $slug, string $default): string
    {
      $template =  self::FOLDER_TEMPLATES . '.' . $default;
      if(View::exists(self::FOLDER_TEMPLATES . '.' . $slug)) {
        $template = self::FOLDER_TEMPLATES . '.' . $slug;
      }
      return $template;
    }
}