<?php

class tr_field_radio extends tr_field {

  function render() {
    $name = $this->attr['name'];
    $this->type = 'radio';
    $option = esc_attr($this->get_value());
    unset($this->attr['name']);
    $field = '<ul class="data-full">';
    foreach($this->options as $key => $value) {
      if($option == $value) {
        $this->attr['checked'] = 'checked';
      }
      else {
        unset($this->attr['checked']);
      }

      $field .= "<li><label>";
      $field .= tr_html::input($this->type, $name, $value, $this->attr);
      $field .= "<span>{$key}</span></label>";
    }
    $field .= '</ul>';
    return $field;
  }

}