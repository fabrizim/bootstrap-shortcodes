<?
/*
      ___         ___                   
     /\__\       /\  \         _____    
    /:/ _/_     /::\  \       /::\  \   
   /:/ /\__\   /:/\:\  \     /:/\:\  \  
  /:/ /:/  /  /:/ /::\  \   /:/ /::\__\ 
 /:/_/:/  /  /:/_/:/\:\__\ /:/_/:/\:|__|
 \:\/:/  /   \:\/:/  \/__/ \:\/:/ /:/  /
  \::/__/     \::/__/       \::/_/:/  / 
   \:\  \      \:\  \        \:\/:/  /  
    \:\__\      \:\__\        \::/  /   
     \/__/       \/__/         \/__/
     

Plugin Name: Twitter Bootstrap Shortcodes
Description: Shortcodes Library for Twitter Bootstrap.
Author: Mark Fabrizio
Version: 1.0.0
Author URI: http://www.owlwatch.com
*/

add_action('plugins_loaded', 'fabs_twitter_bootstrap_shortcodes');
function fabs_twitter_bootstrap_shortcodes()
{
  /********************************************************
  *  Reqires Snap
  *********************************************************/
  if( !class_exists('Snap') ){
    add_action('admin_notices', 'fabs_twitter_bootstrap_shortcodes_alert');
    function fabs_twitter_bootstrap_shortcodes_alert()
    {
      ?>
      <div class="error">
        Twitter Bootstrap Shortcodes requires the
        <a href="https://github.com/fabrizim/Snap">Snap plugin</a>.
      </div>
      <?
    }
    return;
  }
  
  // Snap_Loader::register('Fabs_Bootstrap', dirname(__FILE__).'/lib');
  require_once(dirname(__FILE__).'/lib/Shortcodes.php');
  Snap::inst('Fabs_Bootstrap_Shortcodes');
  
  /********************************************************
  * We need this to avoid a bunch of extra paragraphs where
  * content has unavoidable line breaks
  *********************************************************/
  remove_filter( 'the_content', 'wpautop' );
  add_filter( 'the_content', 'wpautop' , 12);
}