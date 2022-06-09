<?php
/**
 * This file is part of RSS-Bridge, a PHP project capable of generating RSS and
 * Atom feeds for websites that don't have one.
 *
 * For the full license information, please view the UNLICENSE file distributed
 * with this source code.
 *
 * @package	Core
 * @license	http://unlicense.org/ UNLICENSE
 * @link	https://github.com/rss-bridge/rss-bridge
 */

// based on https://github.com/laravel/framework/blob/8.x/src/Illuminate/Support/Str.php

if (!function_exists('str_starts_with')) {
	function str_starts_with($haystack, $needle) {
		return (string)$needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
	}
}

if (!function_exists('str_ends_with')) {
	function str_ends_with($haystack, $needle) {
		return $needle !== '' && substr($haystack, -strlen($needle)) === (string)$needle;
	}
}

if (!function_exists('str_contains')) {
	function str_contains($haystack, $needle) {
		return $needle !== '' && mb_strpos($haystack, $needle) !== false;
	}
}

// php 7.3 https://github.com/symfony/polyfill/blob/main/src/Php73/bootstrap.php
if (!function_exists('array_key_first')) {
	function array_key_first(array $array) {
		foreach ($array as $key => $value) {
			return $key;
		}
	}
}
if (!function_exists('array_key_last')) {
	function array_key_last(array $array) {
		return key(array_slice($array, -1, 1, true));
	}
}
