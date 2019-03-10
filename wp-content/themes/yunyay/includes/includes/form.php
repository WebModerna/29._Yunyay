<?php
// file: Form.php
namespace Custom_Reg;

class Form {

  protected $fields;

  protected $verb = 'POST';

  protected $template;

  protected $form;

  public function __construct() {
    $this->fields = new \ArrayIterator();
  }

  public function create() {
    do_action( 'custom_reg_form_create', $this );
    $form = $this->open();
    $it =  $this->getFields();
    $it->rewind();
    while( $it->valid() ) {
      $field = $it->current();
      if ( ! $field instanceof FieldInterface ) {
        throw new \DomainException( "Invalid field" );
      }
      $form .= $field->create() . PHP_EOL;
      $it->next();
    }
    do_action( 'custom_reg_form_after_fields', $this );
    $form .= $this->close();
    $this->form = $form;
    add_action( 'custom_registration_form', array( $this, 'output' ), 0 );
  }

  public function output() {
    unset( $GLOBALS['wp_filters']['custom_registration_form'] );
    if ( ! empty( $this->form ) ) {
      echo $this->form;
    }
  }

  public function getTemplate() {
    return $this->template;
  }

  public function setTemplate( $template ) {
    if ( ! is_string( $template ) ) {
      throw new \InvalidArgumentException( "Invalid template" );
    }
    $this->template = $template;
  }

  public function addField( FieldInterface $field ) {
    $hook = 'custom_reg_form_create';
    if ( did_action( $hook ) && current_filter() !== $hook ) {
      throw new \BadMethodCallException( "Add fields before {$hook} is fired" );
    }
    $this->getFields()->append( $field );
  }

  public function getFields() {
    return $this->fields;
  }

  public function getVerb() {
    return $this->verb;
  }

  public function setVerb( $verb ) {
    if ( ! is_string( $verb) ) {
     throw new \InvalidArgumentException( "Invalid verb" );
    }
    $verb = strtoupper($verb);
    if ( in_array($verb, array( 'GET', 'POST' ) ) ) $this->verb = $verb;
  }

  protected function open() {
    $out = sprintf( '<form id="custom_reg_form" method="%s">', $this->verb ) . PHP_EOL;
    $nonce = '<input type="hidden" name="_n" value="%s" />';
    $out .= sprintf( $nonce,  wp_create_nonce( 'custom_reg_form_nonce' ) ) . PHP_EOL;
    $identity = '<input type="hidden" name="custom_reg_form" value="%s" />';
    $out .= sprintf( $identity,  __CLASS__ ) . PHP_EOL;
    return $out;
  }

  protected function close() {
    $submit =  __('Register', 'custom_reg_form');
    $out = sprintf( '<input type="submit" value="%s" />', $submit );
    $out .= '</form>';
    return $out;
  }

}?>