<section class="well">
<h3> Heading </h3>
<hr>
<div class="form-group">
    <div class="input-group">
	<input type="text" id="<?= $this->get_field_id('heading'); ?>" name="<?= $this->get_field_name('heading'); ?>" class="form-control" placeholder="Tile Heading" value="<?= $instance['heading'] ?>">
    <span class="input-group-addon">
    	<label>Size: </label>
	    <select class="type" id="<?= $this->get_field_id('headingSize'); ?>" name="<?= $this->get_field_name('headingSize'); ?>">
	        <option value="h1" <?php selected('h1', $instance['headingSize']);?>>Huge</option>
	        <option value="h2" <?php selected('h2', $instance['headingSize']);?>>Large</option>
	        <option value="h3" <?php selected('h3', $instance['headingSize']);?>>Medium</option>
	        <option value="h4" <?php selected('h4', $instance['headingSize']);?>>Small</option>
	    </select>
	    <label>Type: </label>
	    <select class="type" id="<?= $this->get_field_id('headingType'); ?>" name="<?= $this->get_field_name('headingType'); ?>">
	        <option value="h1" <?php selected('h1', $instance['headingType']);?>>H1</option>
	        <option value="h2" <?php selected('h2', $instance['headingType']);?>>H2</option>
	        <option value="h3" <?php selected('h3', $instance['headingType']);?>>H3</option>
	        <option value="h4" <?php selected('h4', $instance['headingType']);?>>H4</option>
	    </select>  
        <label>Align: </label>
		<select id="<?= $this->get_field_id('headingAlign'); ?>" name="<?= $this->get_field_name('headingAlign'); ?>">
			<option  value="align-center" <?php selected('align-center', $headingAlign, true);?> >Center</option>
			<option  value="align-left"   <?php selected('align-left', $headingAlign, true);?>>Left</option>
			<option  value="align-right"  <?php selected('align-right', $headingAlign, true);?>>Right</option>
		</select> 
		<label>Colour: </label>
		<select id="<?= $this->get_field_id('colour'); ?>" name="<?= $this->get_field_name('colour'); ?>">
			<option  value="" <?php selected('', $colour, true);?> >Normal</option>
			<option  value="light" <?php selected('light', $colour, true);?> >Light</option>
			<option  value="invert"   <?php selected('invert', $colour, true);?>>Inverted</option>
		</select> 
	</span>
    </div>
</div>
</section>

<?= $this->textInput('donkey', array('placeholder'=>'donkeyName'));?>