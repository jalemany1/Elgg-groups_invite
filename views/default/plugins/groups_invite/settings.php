<?php
$entity = elgg_extract('entity', $vars);
?>

<div>
	<label><?= elgg_echo('groups:invite:settings:require_confirmation') ?></label>
	<div class="elgg-text-help"><?= elgg_echo('groups:invite:settings:require_confirmation:help') ?></div>
	<?php
	echo elgg_view('input/select', array(
		'name' => 'params[require_confirmation]',
		'value' => $entity->require_confirmation,
		'options_values' => array(
			0 => elgg_echo('option:no'),
			1 => elgg_echo('option:yes'),
		)
	));
	?>
</div>

<div>
	<label><?= elgg_echo('groups:invite:settings:users_tab') ?></label>
	<div class="elgg-text-help"><?= elgg_echo('groups:invite:settings:users_tab:help') ?></div>
	<?php
	echo elgg_view('input/select', array(
		'name' => 'params[users_tab]',
		'value' => $entity->users_tab,
		'options_values' => array(
			0 => elgg_echo('option:no'),
			1 => elgg_echo('option:yes'),
		)
	));
	?>
</div>

<div>
	<label><?= elgg_echo('groups:invite:settings:emails_tab') ?></label>
	<div class="elgg-text-help"><?= elgg_echo('groups:invite:settings:emails_tab:help') ?></div>
	<?php
	echo elgg_view('input/select', array(
		'name' => 'params[emails_tab]',
		'value' => $entity->emails_tab,
		'options_values' => array(
			0 => elgg_echo('option:no'),
			1 => elgg_echo('option:yes'),
		)
	));
	?>
</div>