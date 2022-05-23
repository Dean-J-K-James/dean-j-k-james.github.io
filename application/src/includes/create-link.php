<?php

/**
 * 
 */
function create_link($link) { return APPPATH . "/" . $link; }

/**
 * 
 */
function get_link() { return $_SERVER['REQUEST_URI']; }

/**
 * 
 */
function load_file($file) { return $_SERVER['DOCUMENT_ROOT'] . load_asset($file); }

/**
 * 
 */
function load_asset($file) { return asset_exists($file) ? APPPATH . "/application/" . BRAND . "/" . $file : APPPATH . "/src/" . $file; }

/**
 * 
 */
function asset_exists($file) { return file_exists($_SERVER['DOCUMENT_ROOT'] . APPPATH . "/application/" . BRAND . "/" . $file); }