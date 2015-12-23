<?php

$entity = elgg_extract('entity', $vars);

/**
 * @todo: in 2.1+ implement custom queries to exclude group members
 * @see Elgg#9252
 */

echo elgg_view_input('tokeninput/users', array(
	'name' => 'invitee_guids',
	'label' => elgg_echo('groups:invite:users:select'),
	'multiple' => true,
));