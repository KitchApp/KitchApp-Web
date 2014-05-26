<?php
/**
 * @file
 * Callbacks de administración del módulo buy_list.
 */

/**
 * Define el formulario de opciones de configuración.
 */
function buy_list_configuracion() {  
  $form['buy_list_mensaje'] = array(
    '#title' => 'Mensaje que se muestra al usuario',  
    '#type' => 'textfield',
    '#default_value' => variable_get('buy_list_mensaje', 'Despensa Actualizada'),    
  );
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Guardar configuración',
  );
  $form['#submit'][] = 'buy_list_configuracion_submit';  
  return $form;
}

/**
 * Valida el formulario de opciones de configuración.
 */
function buy_list_configuracion_validate($form, &$form_state) {
  if (trim($form_state['values']['buy_list_mensaje']) == '') {
    form_set_error('buy_list_mensaje', 'El mensaje no puede quedar vacío.');
  }
}

/**
 * Procesa el envío del formulario de opciones de configuración.
 */
function buy_list_configuracion_submit($form, $form_state) {
  variable_set('buy_list_mensaje', $form_state['values']['buy_list_mensaje']);
  drupal_set_message("Se han guardado las opciones de configuración.");
}
