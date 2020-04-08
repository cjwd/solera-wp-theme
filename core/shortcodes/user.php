<?php

add_shortcode('solera_user', 'sc_solera_user');
function sc_solera_user($atts) {
  $atts = shortcode_atts(
    [
      'wrapper' =>  'h1',
      'user'  =>  '', // | ID | slug | email | login. e.g id:22
      'class' => '',
    ],
    $atts,
    'solera_user'
  );

  extract($atts);

  if(empty($user)) {
    $current_user = wp_get_current_user();
  } else {
    $user = explode(':', $user);
    $current_user = get_user_by($user[0], $user[1]);
  }

  $class = !empty($class) ? ' class="' . $class . '"' : false;
  $user = '<' . $wrapper . $class . '>' . $current_user->user_firstname . ' ' . $current_user->user_lastname . '</' . $wrapper . '>';

  return $user;
}