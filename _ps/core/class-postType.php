<?php

class tr_post_type extends tr_base {

  public $id = null;
  public $singular = null;
  public $plural = null;
  public $title = null;
  public $form = null;
  public $use = null;
  public $taxonomies = array();
  public $args = array();
  private $icon = null;
  
  function icon($name) {
    $name = strtolower($name);
    $this->icon = tr_icons::$icon[$name];
    add_action( 'admin_head', array($this, 'set_icon') );
    return $this;
  }

  public function set_icon() { ?>

    <style type="text/css">
      #adminmenu #menu-posts-<?php echo $this->id; ?> .wp-menu-image:before {
        font: 400 15px/1 'typerocket-icons' !important;
        content: '<?php echo $this->icon; ?>';
        speak: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    </style>

  <?php }

  /**
   * Make Post Type. Do not use before init.
   *
   * @param string $singular singular name is required
   * @param string $plural plural name is required
   * @param array $settings args override and extend
   * @return $this
   */
  function make($singular = null, $plural = null, $settings = array() ) {
    $this->check($singular, 'Making tr_post_type, you need to enter a singular name.');
    $this->check($plural, 'Making tr_post_type, you need to enter a plural name.');

    $this->form = new ArrayObject(array(
        'top' => null,
        'title' => null,
        'editor' => null,
        'bottom' => null
    ) );

    // setup object for later use
    $this->plural = $plural;
    $this->singular = $singular;
    $this->sanitize_string($this->plural);
    $this->sanitize_string($this->singular);
    $this->id = $this->singular;

    // make lowercase
    $singular = strtolower($singular);
    $plural = strtolower($plural);
    $upperSingular = ucwords($singular);
    $upperPlural = ucwords($plural);

    $labels = array(
      'add_new' => 'Add New',
      'add_new_item' => 'Add New '.$upperSingular,
      'edit_item' => 'Edit '.$upperSingular,
      'menu_name' => $upperPlural,
      'name' => $upperPlural,
      'new_item' => 'New '.$upperSingular,
      'not_found' =>  'No '.$plural.' found',
      'not_found_in_trash' => 'No '.$plural.' found in Trash',
      'parent_item_colon' => '',
      'search_items' => 'Search '.$upperPlural,
      'singular_name' => $upperSingular,
      'view_item' => 'View '.$upperSingular,
    );

    if(array_key_exists('capabilities', $settings) && $settings['capabilities'] === true) :
      $settings['capabilities'] = array(
      'publish_posts' => 'publish_'.$this->plural,
      'edit_post' => 'edit_'.$this->singular,
      'edit_posts' => 'edit_'.$this->plural,
      'edit_others_posts' => 'edit_others_'.$this->plural,
      'delete_post' => 'delete_'.$this->singular,
      'delete_posts' => 'delete_'.$this->plural,
      'delete_others_posts' => 'delete_others_'.$this->plural,
      'read_post' => 'read_'.$this->singular,
      'read_private_posts' => 'read_private_'.$this->plural,
    );
    endif;

    $defaults = array(
      'labels' => $labels,
      'description' => $plural,
      'rewrite' => array( 'slug' => $this->plural),
      'public' => true,
      'supports' => array('title', 'editor'),
      'has_archive' => true,
      'taxonomies' => array()
    );

    if(array_key_exists('admin_only', $settings) && $settings['admin_only'] == true) {
      $admin_only = array(
        'public' => false,
        'has_archive' => false,
        'show_ui' => true
      );
      unset($settings['admin_only']);
      $defaults = array_merge($defaults, $admin_only);
    }


    if(array_key_exists('taxonomies', $settings)) {
      $this->merge($this->taxonomies, $settings['taxonomies']);
      $settings['taxonomies'] = $this->taxonomies;
    }

    $this->args = array_merge($defaults, $settings);

    return $this;
  }

  function apply($use) {

    if( isset($use) ) :
      $this->uses($use, 'TypeRocket: Must use an array for $use when making a taxonomy. $use is the third arg.');
      $this->use = $use;
    endif;

    return $this;
  }

  function bake() {
    if( array_key_exists($this->id, $this->reserved_names) ) :
      die('TypeRocket: Error, you are using the reserved wp name "' . $this->id . '".');
    endif;

    do_action('tr_register_post_type_'.$this->id, $this);
    register_post_type($this->id, $this->args);

    return $this;
  }

  function add_meta_box($s) {
    if( is_string($s) ) {
      $this->merge($this->args['supports'], array($s));
      $this->args['supports'] = array_unique($this->args['supports']);
    }
  }

  function add_taxonomy($s) {
    if( is_string($s) ) {
      $this->merge($this->taxonomies, array($s));
      $this->taxonomies = array_unique($this->taxonomies);
      $this->args['taxonomies'] = $this->taxonomies;
    }
  }

  function add_form_content($post, $args) {
    if($post->post_type == $this->id) :

      $func = 'add_form_content_' . $this->id . '_' . $args;

      echo '<div class="typerocket-container typerocket-dev">';
      if(function_exists($func)) :
        $func($post);
      elseif(TR_DEBUG == true) :
        echo "<div class=\"tr-dev-alert-helper\"><i class=\"icon tr-icon-bug\"></i> Add content here by defining: <code>function {$func}() {}</code></div>";
      endif;
      echo '</div>';


    endif;
  }

  function edit_form_top($post) {
    $args = 'top';
    $this->add_form_content($post, $args);
  }

  function edit_form_after_title($post) {
    $args = 'title';
    $this->add_form_content($post, $args);
  }

  function edit_form_after_editor($post) {
    $args = 'editor';
    $this->add_form_content($post, $args);
  }

  function dbx_post_sidebar($post) {
    $args = 'bottom';
    $this->add_form_content($post, $args);
  }

  function enter_title_here($s) {
    global $post;

    if($post->post_type == $this->id) :
      return $this->title;
    else :
      return $s;
    endif;
  }

  function tr_taxonomy($v) {
    $this->add_taxonomy($v->id);
  }

  function tr_meta_box($v) {
    $this->add_meta_box($v->id);
  }

  function tr_uses($v) {
    $this->add_taxonomy($v);
  }

}