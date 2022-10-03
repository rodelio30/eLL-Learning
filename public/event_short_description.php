<?php
function elipsis($text, $words = 15)
{
  // Check if string has more than X words
  if (str_word_count($text) > $words) {

    // Extract first X words from string
    preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$words}/", $text, $matches);
    $text = trim($matches[0]);

    // Let's check if it ends in a comma or a dot.
    if (substr($text, -1) == ',') {
      // If it's a comma, let's remove it and add a ellipsis
      $text = rtrim($text, ',');
      $text .= '...';
    } else if (substr($text, -1) == '.') {
      // If it's a dot, let's remove it and add a ellipsis (optional)
      $text = rtrim($text, '.');
      $text .= '...';
    } else {
      // Doesn't end in dot or comma, just adding ellipsis here
      $text .= '...';
    }
  }
  // Returns "ellipsed" text, or just the string, if it's less than X words wide.
  return $text;
}