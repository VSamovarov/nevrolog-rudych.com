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
    const DEFAULT_INDEX_TEMPLATE_NAME = 'index';

    public function slug($slug='', PostQueries $queries)
    {
      if(empty($slug)) $slug = self::MAIN_PAGE_SLUG;
      return view(
        $this->getTemplate($slug,self::DEFAULT_PAGE_TEMPLATE_NAME),
        ['main'=>$queries->getBySlug($slug)]
      );
    }

    public function index($type, PostQueries $queries)
    {
      return view(
        $this->getTemplate($type, self::DEFAULT_INDEX_TEMPLATE_NAME),
        ['main' => $queries->index(['type'=>$type])]
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