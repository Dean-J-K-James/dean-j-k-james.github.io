<?php

$pardown = new Parsedown();
$content = $pardown->text(file_get_contents(load_file('contents/' . $data['slug'] . '/article.md')));
echo str_replace('%CNTNT%', APPPATH . '/assets/contents/' . $data['slug'], $content);
