<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (isset($_SERVER['HTTP_HOST']))
{
	$__protocol = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
	$__full =  $__protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$__base = array_shift(explode('api.php', $__full));
	$__rel = str_replace($__protocol . '://' . $_SERVER['HTTP_HOST'], '', $__full);
	$__obj = new stdClass;
	$__obj->full = $__full;
	$__obj->base = $__base;
	$__obj->relative = $__rel;
	$config['koken_url_info'] = $__obj;
}
else
{
	$config['koken_url_info'] = 'unknown';
}

$key = Shutter::get_encryption_key();

if ($key)
{
	$config['encryption_key'] = $key;
}

if (!defined('MAGICK_PATH')) {
	define('MAGICK_PATH_FINAL', 'convert');
} else if (strpos(strtolower(MAGICK_PATH), 'c:\\') !== false) {
	define('MAGICK_PATH_FINAL', '"' . MAGICK_PATH . '"');
} else {
	define('MAGICK_PATH_FINAL', MAGICK_PATH);
}

if (!defined('FFMPEG_PATH')) {
	define('FFMPEG_PATH_FINAL', 'ffmpeg');
} else {
	define('FFMPEG_PATH_FINAL', FFMPEG_PATH);
}

if (!defined('AUTO_UPDATE')) {
	define('AUTO_UPDATE', true);
}

// Director constants
define('KOKEN_VERSION', '0.21.9');

/* End of file koken.php */
/* Location: ./system/application/config/koken.php */