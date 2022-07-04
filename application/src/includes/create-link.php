<?php

#
function create_link($link) { return APPPATH . "/" . $link; }

#
function get_link() { return $_SERVER['REQUEST_URI']; }

#
function load_file($file) { return $_SERVER['DOCUMENT_ROOT'] . load_asset($file); }

#
function load_asset($file) { return brand_exists($file) ? APPPATH . "/application/" . BRAND . "/" . $file : (dependency_exists($file) ? APPPATH . "/dependencies/" . $file : APPPATH . "/src/" . $file); }

#
function brand_exists($file) { return file_exists($_SERVER['DOCUMENT_ROOT'] . APPPATH . "/application/" . BRAND . "/" . $file); }

#
function dependency_exists($file) { return file_exists($_SERVER['DOCUMENT_ROOT'] . APPPATH . "/dependencies/" . $file); }