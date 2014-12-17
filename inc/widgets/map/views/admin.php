
<style>
	.pac-container{
	z-index: 999999999;	
	}
</style>
<div class="form-group">
    <div class="input-group">
        <input type="text" id="<?= $this->get_field_id('heading') ?>" class="form-control" placeholder="Your Heading" name="<?= $this->get_field_name('heading') ?>" value="<?= esc_attr($instance['heading']) ?>">
        <span class="input-group-addon">
            Style: 
            <select id="<?= $this->get_field_id('style'); ?>" name="<?= $this->get_field_name('style'); ?>">
                <option value="h1" <?php selected('h1', $instance['style']);?>>H1</option>
                <option value="h2" <?php selected('h2', $instance['style']);?>>H2</option>
                <option value="h3" <?php selected('h3', $instance['style']);?>>H3</option>
                <option value="h4" <?php selected('h4', $instance['style']);?>>H4</option>                
            </select>
        </span>
        <span class="input-group-addon">
            Align: 
            <select id="<?= $this->get_field_id('align'); ?>" name="<?= $this->get_field_name('align'); ?>">
                <option value="align-center" <?php selected('align-center', $instance['align']);?>>Center</option>
                <option value="align-left" <?php selected('align-left', $instance['align']);?>>Left</option>
                <option value="align-right" <?php selected('align-right', $instance['align']);?>>Right</option>  
                <option value="justify" <?php selected('justify', $instance['align']);?>>Justify</option>             
            </select>
        </span>
    </div>
</div>

<input id="background-color" type="color" value="#ff0000" onchange="javascript:document.getElementById('chosen-color').value = document.getElementById('background-color').value;">
<input type="text" onchange="updateMap()"  id="chosen-color">
<input type="color" id="col" onchange="alert(jQuery(this).val()">
 <table border="0" cellpadding="5" id="rsmaps">
<input name="address" id="address" type="text" placeholder="Your Address">
<div id="latlng">
<input readonly="true" name="lat" id="lat" value="-33.390839" type="text" onblur="updateMap()" >
<input  name="lng" id="lng" type="text" value="151.39835600000004" onchange="updateMap()">
</div>              
                <!-- Marker icon url -->
                <tr>
                    <tr>
                    <td scope="row" align="left" valign="top"></td>
                    <td valign="top">
                        <label><input name="color" type="radio" value="custom" onclick="updateMap()" /></label>
                        <textarea name="iconurl" id="iconurl" rows="2" cols="66" type='textarea' onblur="">http://yava.ro/icons/car.png</textarea><br>
                    </td>
                </tr>

                <!-- Controls -->
                <tr>
                    <td align="left"><?php echo __('Controls') ?></td>
                    <td>
                        <?php echo __('Pan control') ?>
                        <select name='panControl' id='panControl' onchange="updateMap()">
                            <option value='' selected><?php echo __('no') ?></option>
                            <option value='true'><?php echo __('yes') ?></option>
                        </select>
                         Scale control
                        <select name='scaleControl' id='scaleControl' onchange="updateMap()">
                            <option value='false' selected><?php echo __('no') ?></option>
                            <option value='true'><?php echo __('yes') ?></option>
                        </select>
                        Type control
                        <select name='typeControl' id='typeControl' onchange="updateMap()">
                            <option value='' selected><?php echo __('no') ?></option>
                            <option value='true'><?php echo __('yes') ?></option>
                        </select>
                        Street control
                        <select name='streetControl' id='streetControl' onchange="updateMap()">
                            <option value='' selected><?php echo __('no') ?></option>
                            <option value='true'><?php echo __('yes') ?></option>
                        </select>
                    </td>
                </tr>

                <!-- Second line with map controls -->
                <tr>
                    <td align="left"></td>
                    <td>
                        <?php echo __('Zoom level') ?> &nbsp;
                        <select name="zoom" id="zoom" onchange="updateMap()">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13' selected>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            </select>
                        <?php echo __('Zoom control') ?>
                        <select name='zoomControl' id='zoomControl' onchange="updateMap()">>
                            <option value='' selected>no</option>
                            <option value='true'>yes</option>
                        </select>
                        <?php echo __('Scroll wheel') ?>
                        <select name='scrollwheel' id='scrollwheel' onchange="updateMap()">>
                            <option value='' selected>no</option>
                            <option value='true'>yes</option>
                        </select>
                        <?php echo __('Draggable map') ?>
                        <select name='draggable' id='draggable' onchange="updateMap()">>
                            <option value=''>no</option>
                            <option value='true' selected>yes</option>
                        </select>
                        </td>
                </tr>
                
                <!-- Height -->
                <tr>
                    <td align="left"><?php echo __('Map height') ?></td>
                    <td>
                        <input type="text" size="6" name="height" id="height" value="500" onblur="updateMap()"/>
                        <span class="info">In px</span>
                    </td>
                </tr>
                
                <!-- Map Type -->
                <tr>
                    <td align="left"><?php echo __('Map type') ?></td>
                    <td>
                        <select name='type' id="type" onchange="updateMap()">
                            <option value='roadmap' selected><?php echo __('roadmap') ?></option>
                            <option value='satellite'><?php echo __('satellite') ?></option>
                            <option value='terrain'><?php echo __('terrain') ?></option>
                            <option value='hybrid'><?php echo __('hybrid') ?></option>
                        </select>
                        <span class="info"><?php echo __('Possible values: roadmap, satellite, terrain or hybrid') ?></span>
                    </td>
                </tr>

                <!-- Popup -->
                <tr>
                    <td align="left"><?php echo __('Popup') ?></td>
                    <td>
                        <select name='popup' id="popup" onchange="updateMap()">
                            <option value=''><?php echo __('hidden') ?></option>
                            <option value='true' selected><?php echo __('visible') ?></option>
                        </select>
                        <span class="info"><?php echo __('The popup window which appears when a marker is clicked.') ?></span>
                    </td>
                </tr>
                                
            </table>
            
<div id="responsive_map" class="responsive-map" style="height:500px;width:100%;"></div>
<div id="map-canvas" style="height:500px;width:100%;"></div>
<script type="text/javascript">
var map, data, parent = jQuery('#responsive_map');
/*
jQuery(window).ready(function () {
var map = jQuery('#responsive_map');
map.gMap();
});
*/
  function createNewMap() {
    parent.html('');
    var h = parseInt(jQuery("#height").val());
    var m = jQuery('<div style="width: 100%;height: '+h+'px;"></div>');
    parent.append(m);
    return m;
  }
function updateMap() {

var hue = jQuery("#chosen-color").val();
/* var map = jQuery('#responsive_map'); */
    map = createNewMap();
    
    map.gMap({
	  latitude: jQuery("#lat").val(),
	  longitude: jQuery("#lng").val(),
	  maptype: jQuery("select#type").val(), 
/*
      markers: [
                {
          latitude: 50.083,
          longitude: 19.917,
          html: '<div class="test_marker">marker 1</div>'
                }, {
          latitude: 50.09,
          longitude: 19.92,
          html: 'marker 2'
                }
      ],
*/ 
    zoom: parseInt(jQuery("select#zoom").val()),
      /*  Controls */
    mapTypeControl: Boolean(jQuery("select#typeControl").val()),
    zoomControl: Boolean(jQuery("select#zoomControl").val()),
    panControl: Boolean(jQuery("select#panControl").val()),
    scaleControl: Boolean(jQuery("select#scaleControl").val()),
    streetViewControl: Boolean(jQuery("select#streetControl").val()),
    draggable: false,
    styles: [{"stylers":[{"hue": hue}]},
    		{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},
    		{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]}],
/*  controlsPositions: */
/*  controlsStyle: */
/*  controls: */
	scrollwheel:Boolean(jQuery("select#scrollwheel").val()),
    });

/* map.gMap('changeSettings', { */

/* 	Main */
/* 	log */
/* 	latitude: jQuery("#lat").val(), */
/* 	longitude: jQuery("#long").val(), */
/* 	address: jQuery("#address").val(), */
/* 	zoom: parseInt(jQuery("select#zoom").val()), */
/* 	minZoom: */
/* 	maxZoom: */
/*     maptype: 'satellite', */
    
/*  Controls */
/*     mapTypeControl: Boolean(jQuery("select#typeControl").val()), */
/*     zoomcontrol: Boolean(jQuery("select#zoomControl").val()), */
/*     panControl: Boolean(jQuery("select#panControl").val()), */
/*     scaleControl: Boolean(jQuery("select#scaleControl").val()), */
/*     streetViewControl: Boolean(jQuery("select#streetControl").val()), */
/*  controlsPositions: */
/*  controlsStyle: */
/*  controls: */
/* 	scrollwheel:Boolean(jQuery("select#scrollwheel").val()), */

/* Route Finder */
/* 	routeFinder: */
    

/* }); */


}


jQuery('#lat').bind("change", function () {
    alert('changed');
});
function updateHeight() {
	var h = parseInt(jQuery("#height").val());
	jQuery('#responsive_map').height(h);
	google.maps.event.trigger(map, 'resize'); 
}


</script>

 <script>
      jQuery(function(){
        jQuery("#address").geocomplete({
          details: "#latlng"
        });
      });
    </script>
    
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
