<?php

namespace App;

class TagParser
{
  public function parse(string $tags): array
  {
    return preg_split('/ ?[,|] ?/', $tags);

    // return $tags;

    // return array_map(fn ($tag) => trim($tag), $tags);

    // return array_map(function ($tag) {
    // return trim($tag);
    // }, $tags);
  }
}