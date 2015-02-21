<?php define('WP_END', microtime(true)); ?>
<div class="wrap">
<h2>Dev</h2>

  <div>
    <div id="tr-dev-content" class="typerocket-container typerocket-dev">
    <?php
    $screen = new tr_layout();
    $screen->add_tab( array(
      'id' => 'stats',
      'title' => 'Stats',
      'content' => '',
      'callback' => 'tr_dev_stats'
    ) )->add_tab( array(
      'id' => 'plugins',
      'title' => 'Plugins',
      'content' => '',
      'callback' => 'tr_dev_plugins'
    ) )->make();  ?>
    </div>
  </div>

</div>

<?php

function tr_dev_stats() {

if(defined('WP_START')) { ?>

<h3><i class="tr-icon-pie"></i> Run Time and Memory Stats</h3>
<p>If you are using xDebug profiling or tracking times will be slower.</p>

<b>TR Run Time</b>: <?php echo TR_END - TR_START; ?><br>
<b>Memory Use</b>: <?php echo memory_get_usage() / 1024 / 1024; ?> MB<br>
<b>Peak Memory Use</b>: <?php echo memory_get_peak_usage() / 1024 / 1024; ?> MB

<?php } else { ?>

<p>Add this code in your wp-config.php file. This will enable debug stats.</p>
<p><code>define('WP_START', microtime(true));</code></p>

<?php }

}

function tr_dev_plugins() {

  $plugins = tr::$plugins;

  echo '<h3><i class="tr-icon-cog"></i> Active Plugins</h3><p>Active TypeRocket plugins being used on this site.</p><ul>';
  foreach($plugins as $k => $v) {
    echo tr_html::element('li', array(), $v);
  }
  echo '</ul>';

}