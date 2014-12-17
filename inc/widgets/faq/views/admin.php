<div class="form-group">
    <div class="input-group">
        <input type="text" id="<?= $this->get_field_id('text'); ?>" name="<?= $this->get_field_name('text'); ?>" class="form-control" placeholder="Button Text" value="<?= $instance['text'] ?>">
        <span class="input-group-addon">
            Type: 
            <select class="type" id="<?= $this->get_field_id('type'); ?>" name="<?= $this->get_field_name('type'); ?>">
            	<option value="" <?php selected('', $instance['type']);?>>Select Type of Button</option>
                <option value="url" <?php selected('url', $instance['type']);?>>Link Url</option>
                <option value="email" <?php selected('email', $instance['type']);?>>Link Email</option>
                <option value="tel" <?php selected('tel', $instance['type']);?>>Link Phone</option>
                <option value="posts" <?php selected('posts', $instance['type']);?>>Link Page/Post</option>
                <option value="trigger" <?php selected('trigger', $instance['type']);?>>Javascript Trigger</option>
            </select>
        </span>
    </div>
</div>
<div id="url" class="types" style="display:none">
<div class="input-group">
    <span class="input-group-addon">http://</span>
	<input type="text" class="form-control" placeholder="Website URL" id="<?= $this->get_field_id('url'); ?>" name="<?= $this->get_field_name('url'); ?>" value="<?= $instance['url'] ?>">
       <span class="input-group-addon">
            Follow: 
            <select id="<?= $this->get_field_id('follow'); ?>" name="<?= $this->get_field_name('follow'); ?>">
            	<option value="" <?php selected('', $instance['follow']);?>>Yes</option>
                <option value="rel='nofollow'" <?php selected("rel='nofollow'", $instance['follow']);?>>No</option>
            </select>
        </span>
        <span class="input-group-addon">
            Window: 
            <select id="<?= $this->get_field_id('window'); ?>" name="<?= $this->get_field_name('window'); ?>">
            	<option value="" <?php selected('', $instance['type']);?>>Current</option>
                <option value="target='_blank'" <?php selected("target='_blank'", $instance['window']);?>>New</option>
            </select>
        </span>

</div>
</div>
<div id="email" class="types" style="display:none">
	<div class="input-group">
		<span class="input-group-addon">Mailto:</span>
		<input type="text" class="form-control" placeholder="Your Email Address" id="<?= $this->get_field_id('email'); ?>" name="<?= $this->get_field_name('email'); ?>" value="<?= $instance['email'] ?>">
	</div>
	<div class="input-group">
		<span class="input-group-addon">Subject:</span>
		<input type="text" class="form-control" placeholder="Default Email Subject Line" id="<?= $this->get_field_id('email-subject'); ?>" name="<?= $this->get_field_name('email-subject'); ?>" value="<?= $instance['email-subject'] ?>">
	</div>
	
</div>
<div id="tel" class="types" style="display:none">
	<div class="input-group">
		<span class="input-group-addon">Tel:</span>
		<input type="text" class="form-control" placeholder="Your Phone Number" id="<?= $this->get_field_id('phone'); ?>" name="<?= $this->get_field_name('phone'); ?>" value="<?= $instance['phone'] ?>">
	</div>
</div>
<div id="posts" class="types" style="display:none">
<select data-placeholder="Choose a post" class="chosen-select" id="<?= $this->get_field_id('post-link'); ?>" name="<?= $this->get_field_name('post-link'); ?>">
<?php
$query = new WP_Query('post_type=any');
while ($query->have_posts()):
    $query->the_post();
    $title = get_the_Title(); 
    $link  = get_permalink();  
    $type  = get_post_type(); 
    echo "<option value='$link' ".selected($link, $instance['post-link']).">$type - $title</option>";
endwhile;               
wp_reset_query();
?>
</select>
	</div>
<div id="trigger" class="types" style="display:none">
	<div class="input-group">
	    <span class="input-group-addon">onclick:</span>
		<input type="text" class="form-control" placeholder="Your Javascript" id="<?= $this->get_field_id('onclick'); ?>" name="<?= $this->get_field_name('onclick'); ?>" value="<?= $instance['onclick'] ?>">
	</div>
</div>
<div>
<label>Style: </label>
	<select id="<?= $this->get_field_id('style'); ?>" name="<?= $this->get_field_name('style'); ?>">
		<option  value="primary" <?php selected('primary', $instance['style'], true);?> >Primary</option>
		<option  value="secondary" <?php selected('secondary', $instance['style'], true);?>>Secondary</option>
		<option  value="ghost" <?php selected('ghost', $instance['style'], true);?>>Ghost</option>
		<option  value="link" <?php selected('link', $instance['style'], true);?>>Simple Link</option>
	</select>
</div>
<div>
	<label>Align: </label>
	<select id="<?= $this->get_field_id('align'); ?>" name="<?= $this->get_field_name('align'); ?>">
		<option  value="center" <?php selected('center', $instance['align'], true);?> >Center</option>
		<option  value="left" <?php selected('left', $instance['align'], true);?>>Left</option>
		<option  value="right" <?php selected('right', $instance['align'], true);?>>Right</option>
		<option  value="block" <?php selected('block', $instance['align'], true);?>>Block</option>
	</select>
</div>

<script>
	 jQuery(function() {
        jQuery('.type').change(function(){
            jQuery('.types').slideUp();
            jQuery('#' + jQuery(this).val()).slideDown();
        });
    });
	jQuery('#' + jQuery('.type').val()).slideDown();

	jQuery(".chosen-select").chosen({ width: "100%", search_contains:true });
</script>