<div>
	<label for="<?= $this->get_field_id('text'); ?>">Button Text: </label>
	<input class="widefat" id="<?= $this->get_field_id('text'); ?>" name="<?= $this->get_field_name('text'); ?>" type="text" value="<?= $instance['text'] ?>">
			</p>
<div>
	<label>Style: </label>
	<select id="<?= $this->get_field_id('style'); ?>" name="<?= $this->get_field_name('style'); ?>">
		<option  value="" <?php selected('', $instance['style'], true);?> >Default</option>
		<option  value="invert" <?php selected('invert', $instance['style'], true);?>>Inverted</option>
		<option  value="ghost" <?php selected('ghost', $instance['style'], true);?>>Ghost</option>
		<option  value="link" <?php selected('link', $instance['style'], true);?>>Simple Link</option>
	</select>
</div>

<div>
	<label>Align: </label>
	<select id="<?= $this->get_field_id('align'); ?>" name="<?= $this->get_field_name('align'); ?>">
		<option  value="" <?php selected('', $instance['align'], true);?> >Center</option>
		<option  value="left" <?php selected('left', $instance['align'], true);?>>Left</option>
		<option  value="right" <?php selected('right', $instance['align'], true);?>>Right</option>
		<option  value="justified" <?php selected('justified', $instance['align'], true);?>>Justified</option>
	</select>
</div>
<div class="input-group">
  <span class="input-group-addon">@</span>
  <input type="text" class="form-control" placeholder="Username">
</div>

<div class="input-group">
  <input type="text" class="form-control">
  <span class="input-group-addon">.00</span>
</div>

   
<div class="form-group">
    <div class="input-group">
        <input type="text" id="extra3" class="form-control" placeholder="Extra name">
        <span class="input-group-addon">
             <label class="checkbox-inline">Per person? </label><input type="checkbox" id="inlineCheckbox6" value="option2">
        </span>
        <span class="input-group-addon">
            To be paid? 
            <select>
                <option value="online">Online</option>
                <option value="on spot">On Spot</option>
            </select>
        </span>
    </div>
</div>

<?php

$args = array(
   'public'   => true,
   '_builtin' => false
);

$output = 'names'; // names or objects, note names is the default
$operator = 'and'; // 'and' or 'or'

$post_types = get_post_types( $args, $output, $operator ); 

foreach ( $post_types  as $post_type ) {

   echo '<p>' . $post_type . '</p>';
}

?>