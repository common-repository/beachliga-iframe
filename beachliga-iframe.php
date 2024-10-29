<?php
/*
Plugin Name: BeachLiga Iframe
Plugin URI: http://wordpress.org/plugins/beachliga-iframe
Description: BeachLiga shortcode for your trainings and tournaments<code>[beachliga src="path/to/your/training/or/tournament"]</code>
Version: 1.0
Author: BeachLiga
Author URI: https://beachliga.com
License: GPLv3
*/

if(!defined('ABSPATH')): // Avoid direct calls to this file and prevent full path disclosure
  exit;
endif;

define('BEACHLIGA_IFRAME_PLUGIN_VERSION', '1.0');

// if(!isset($_GET['active'])):
//   if(!isset($_SESSION['isIFrameSessionStarted'])):
//     $_SESSION['isIFrameSessionStarted'] = 1;
//     $redirect = rawurlencode('http://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
//     header('Location: https://beachliga.com/iframe/session/set/?redirect=' . $redirect);
//     exit;
//   endif;
// endif;

function beachliga_iframe_plugin_add_shortcode_cb($atts){
  $defaults = [
    'src' => 'https://beachliga.com/iframe/',
    'width' => '100%',
    'height' => '500',
    'scrolling' => 'yes',
    'class' => 'beachliga-iframe',
    'frameborder' => '0',
  ];

  foreach($defaults as $default => $value): // add defaults
    if(!@array_key_exists($default, $atts)): // mute warning with "@" when no params at all
      $atts[$default] = $value;
    endif;
  endforeach;

  $iframesrc = null;
  $html = "\n".'<!-- BeachLiga Iframe plugin v.'.BEACHLIGA_IFRAME_PLUGIN_VERSION.' -->'."\n";
  $html .= '<iframe';
  foreach($atts as $attr => $value):
    if(strtolower($attr) == 'src'): // sanitize url
      $value = esc_url($defaults[$attr] . trim($value, '/') . '/?parent=' . get_permalink());
      $iframesrc = $value;
      localize_script($iframesrc);
    endif;

    if(strtolower($attr) != 'same_height_as'
      and strtolower($attr) != 'onload'
      and strtolower($attr) != 'onpageshow'
      and strtolower($attr) != 'onclick'): // remove some attributes
      if($value != ''): // adding all attributes
        $html .= ' ' . esc_attr($attr) . '="' . esc_attr($value) . '"';
      else: // adding empty attributes
        $html .= ' ' . esc_attr($attr);
      endif;
    endif;
  endforeach;

  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  if(strstr($user_agent, 'Safari') != '' && strstr($user_agent, 'Chrome') == ''):
    $html .= ' data-redirect="'.$iframesrc.'"';
  endif;

  $html .= '></iframe>'."\n";

  if(isset($atts["same_height_as"])):
    $html .= '
      <script>
      document.addEventListener("DOMContentLoaded", function(){
        var target_element, iframe_element;
        iframe_element = document.querySelector("iframe.' . esc_attr($atts["class"]) . '");
        target_element = document.querySelector("' . esc_attr($atts["same_height_as"]) . '");
        iframe_element.style.height = target_element.offsetHeight + "px";
      });
      </script>
    ';
  endif;

  $html .= '
    <style>
      .' . esc_attr($atts["class"]) . ',
      iframe.' . esc_attr($atts["class"]) . ',
      .entry-content > iframe.' . esc_attr($atts["class"]) . '{
        max-width: calc(95vw) !important;
        margin-left: auto !important;
        margin-right: auto !important;
        display: block !important;
      }
    </style>
  ';

  return $html;
}
add_shortcode('beachliga', 'beachliga_iframe_plugin_add_shortcode_cb' );

function localize_script($iframesrc){
  $bliframe = ['iframesrc' => $iframesrc, 'foo' => 'var'];
  wp_localize_script( 'beachliga-iframe', 'bliframe', $bliframe );
}

function beachliga_iframe_enqueue_scripts() {
  wp_enqueue_script( 'beachliga-iframe', plugins_url('beachliga-iframe') . '/main.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'beachliga_iframe_enqueue_scripts' );
