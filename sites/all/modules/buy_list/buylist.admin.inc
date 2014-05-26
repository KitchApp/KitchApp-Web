<?php
/**
 * @file
 * Callbacks de administración del módulo buylist.
 */

/**
 * Define el formulario de opciones de configuración.
 */
function buylist_configuracion() {  
  $form['buylist_mensaje'] = array(
    '#title' => 'Mensaje que se muestra al usuario',  
    '#type' => 'textfield',
    '#default_value' => variable_get('buylist_mensaje', 'Despensa Actualizada'),    
  );
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Guardar configuración',
  );
  $form['#submit'][] = 'buylist_configuracion_submit';  
  return $form;
}

/**
 * Valida el formulario de opciones de configuración.
 */
function buylist_configuracion_validate($form, &$form_state) {
  if (trim($form_state['values']['buylist_mensaje']) == '') {
    form_set_error('buylist_mensaje', 'El mensaje no puede quedar vacío.');
  }
}

/**
 * Procesa el envío del formulario de opciones de configuración.
 */
function buylist_configuracion_submit($form, $form_state) {
  variable_set('buylist_mensaje', $form_state['values']['buylist_mensaje']);
  drupal_set_message("Se han guardado las opciones de configuración.");
}
