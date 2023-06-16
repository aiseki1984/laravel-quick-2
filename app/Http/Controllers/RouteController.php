<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
  // public function param(int $id)
  public function param(int $id = 1)
  {
    return 'id値: ' . $id;
  }

  public function search(string $keywd)
  {
    return 'キーワード：' . $keywd;
  }

  public function info()
  {
    return 'info';
  }

  public function article()
  {
    return 'article';
  }

  public function enum_param(Category $category)
  {
    return $category->value;
  }
}

enum Category: string
{
  case Language = 'lang';
  case Framework = 'fw';
  case Tools = 'tools';
}
