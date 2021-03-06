<?php
/**
 * Plugin Name: My IP Address
 * Plugin URI: 
 * Description: Enable shortcode to show user/visitor's IP Address
 * Version: 0.1
 * Text Domain: aadilp_myipaddress
 * Author: Aadil Prabhakar
 * Author URI: 
 */

function aadilp_myipaddress__theip($atts) {
  
  if( ! empty( $_SERVER['CF-Connecting-IP'] ) ) {
    $ip = $_SERVER['CF-Connecting-IP']; //--  --  --  --  --  --  -- Cloudflare support
  } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //--  --  --  --  --  -- Any "forwarded for" IP 
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];  //--  --  --  --  --  --  --  -- Nothing else, then its this :D
  }
  
  return $ip;
}

add_shortcode('aadilp-myipaddress-sc', 'aadilp_myipaddress__theip');
