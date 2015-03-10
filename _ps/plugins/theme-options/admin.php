<?php
  $utility = new tr_utility();
  $form = new tr_form();
  $form->id = 'tr_theme_options';
  $form->make();
  $form->process(); 
  $form->updateCss(); 
?>

<div class="wrap">
  <h2>Theme Options</h2>
  <?php $form->flash(); ?>
  <div>
    <div id="tr-dev-content" class="typerocket-container typerocket-dev">
        <?php $form->open();

        // Settings
        $utility->buffer();
        $form->image('Logo');
        $form->image('FavIcon');
        $form->text('Copyright');
        $form->text('Analytics');
                
        $utility->buffer('footer');

        // Style
        $utility->buffer();
			$form->color('primary');
			$form->color('accent');
			$options = array('none' => '0', 'slight' => '2', 'full' => '10');
			$form->select('rounding', $options);
        $utility->buffer('style');

        // Navigation
        $utility->buffer();
        	$options = array('fixed' => 'fixed', 'trans' => 'trans', 'none' => 'none');
			$form->select('nav', $options);
        $utility->buffer('nav');

		// typography
        $utility->buffer();
        	$form->text('Base Font Size', array('placeholder'=>'Defaults to 16px'));
	        $form->text('Small Heading', array('placeholder'=>'Defaults to 20px'));
	        $form->text('Medium Heading', array('placeholder'=>'Defaults to 24px'));
	        $form->text('Large Heading', array('placeholder'=>'Defaults to 28px'));
	        $form->text('Huge Heading', array('placeholder'=>'Defaults to 32px'));	  
	        ?>
<div class="control-section">
        <div class="control-label"><span class="label">Larger Heading <div class="dev">
        <span class="debug"></span>
          <span class="nav">
          <span class="field">
            <span class="dashicons dashicons-migrate"></span><span>tr_option_field("[larger_heading]");</span>
          </span>
        </span>
      </div></span></div>
        <div class="control">
          <input type="text" name="tr[larger_heading]" value="<?=tr_option_field('[larger_heading]');?>" id="tr_larger_heading" placeholder="Defaults to 128px">
        </div>
      </div>
	        <h2>heading</h2>
	        <div>stuff</div>
	        
	        <?Php      
        $utility->buffer('typography');
        
        
        // save
        $utility->buffer();
        $form->submit('Save');
        $utility->buffer('save');


        // layout
        $screen = new tr_layout();

        $screen->set_sidebar($utility->buffer['save']);

        $screen->add_tab( array(
            'id' => 'Settings',
            'title' => 'Settings',
            'content' => $utility->buffer['footer']
          ) )->add_tab( array(
            'id' => 'style',
            'title' => 'Style',
            'content' => $utility->buffer['style']
          ) )->add_tab( array(
            'id' => 'nav',
            'title' => 'Navigation',
            'content' => $utility->buffer['nav']
          ) )->add_tab( array(
            'id' => 'typography',
            'title' => 'Typography',
            'content' => $utility->buffer['typography']
          ) )->make();

        $form->close();
      ?>

    </div>
  </div>
</div>
