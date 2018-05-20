<?php

class Helpers {
  static function startsWith($haystack, $needle) {
    return $needle === "" || strpos($haystack, $needle) === 0;
  }

  static function blackListedLink($link) {
    $blackListedLinkWords = array("sport", "fodbold", "golf", "haandbold", "cykling", "boksning", "tennis");

    foreach ($blackListedLinkWords as $blackListedLinkWord) {
      if (stristr($link,$blackListedLinkWord)) {
        return true;
      }
    }
    return false;
  }
}