<?php
function tr_taxonomy(
  $singular = null,
  $plural = null,
  $settings = array(),
  $use = array() )
{
  $obj = new tr_taxonomy();
  $obj->make($singular, $plural, $settings)->apply($use)->reg();

  return $obj;
}

function tr_post_type(
  $singular = null,
  $plural = null,
  $settings = array(),
  $use = array())
{
  $obj = new tr_post_type();
  $obj->make($singular, $plural, $settings)->apply($use)->reg();

  return $obj;
}

function tr_meta_box(
  $name = null,
  $settings = array(),
  $use = array() )
{
  $obj = new tr_meta_box();
  $obj->make($name, $settings)->apply($use)->reg();

  return $obj;
}

function tr_form() {
  $obj = new tr_form();
  $obj->make();

  if($obj->controller == 'option') {
    $obj->process();
  }

  return $obj;
}

function tr_post_field($name, $item_id = null) {
  global $post;

  if(isset($post->ID) && is_null($item_id)) {
    $item_id = $post->ID;
  }

  $getter = new tr_get_field();
  return $getter->value($name, $item_id, 'post');
}

function tr_user_field($name, $item_id = null) {
  global $user_id, $post;

  if(isset($user_id) && is_null($item_id)) {
    $item_id = $user_id;
  }
  elseif( is_null($item_id) && isset($post->ID) ) {
    $item_id = get_the_author_meta('ID');
  }
  elseif( is_null($item_id) ) {
    $item_id = get_current_user_id();
  }

  $getter = new tr_get_field();
  return $getter->value($name, $item_id, 'user');
}

function tr_option_field($name) {
  $getter = new tr_get_field();
  return $getter->value($name, null, 'option');
}

function tr_comment_field($name, $item_id = null) {
  global $comment;

  if(isset($comment->comment_ID) && is_null($item_id)) {
    $item_id = $comment->comment_ID;
  }

  $getter = new tr_get_field();
  return $getter->value($name, $item_id, 'comment');
}

function tr_db_field($the_field, $item_id, $controller) {
  global $wpdb;

  $table = $wpdb->prefix.$controller;
  $data = null;
  $fields = $wpdb->get_row( "SELECT * FROM {$table} WHERE id = '{$item_id}'", ARRAY_A ); // WP caches for you
  $data = $fields[$the_field];

  return maybe_unserialize($data);
}

function tr_crud_url( $item_id = null, $action = null, $controller = null) {

  $params = $_GET;

  $params['item_id'] = (is_integer((int)$item_id)) ? $item_id : null;
  $params['action'] = (is_string($action)) ? $action : null;
  $params['controller'] =  (is_string($controller)) ? $action : null;

  $paramString = http_build_query($params);

  return $_SERVER['PHP_SELF'].'?'.$paramString;
}

class tr_ref {

  static public $data = array();

  static function add($name, &$data) {
    self::$data += array($name => $data);
  }

  static function get($name) {
    return self::$data[$name];
  }

  static function remove($name) {
    unset(self::$data[$name]);
  }

}