<?php

/**
 * Groups invite
 *
 * @author Ismayil Khayredinov <info@hypejunction.com>
 * @copyright Copyright (c) 2015, Ismayil Khayredinov
 */
require_once __DIR__ . '/autoloader.php';

elgg_register_event_handler('init', 'system', 'groups_invite_init');

/**
 * Initialize the plugin
 * @return void
 */
function groups_invite_init() {

	elgg_register_action('groups/invite', __DIR__ . '/actions/groups/invite.php');

	add_group_tool_option('invites', elgg_echo('groups:invite:tool_option'), false);

	elgg_register_event_handler('create', 'user', 'groups_invite_user_created_event');

	elgg_extend_view('groups/profile/layout', 'groups/profile/buttons/invite');
}

/**
 * Returns a group invite object
 * 
 * @param string $email  Email address
 * @return ElggObject|false
 */
function groups_invite_get_group_invite($email) {

	$invites = elgg_get_entities_from_metadata(array(
		'types' => 'object',
		'subtypes' => 'group_invite',
		'metadata_name_value_pairs' => array(
			'name' => 'email',
			'value' => $email,
		),
		'limit' => 1,
	));

	return $invites ? $invites[0] : false;
}

/**
 * Creates a new group invite
 *
 * @param string $email Email address
 * @return ElggObject
 */
function groups_invite_create_group_invite($email) {
	$group_invite = groups_invite_get_group_invite($email);
	if ($group_invite) {
		return $group_invite;
	}

	$ia = elgg_set_ignore_access(true);

	$site = elgg_get_site_entity();

	$group_invite = new ElggObject();
	$group_invite->subtype = 'group_invite';
	$group_invite->owner_guid = $site->guid;
	$group_invite->container_guid = $site->guid;
	$group_invite->access_id = ACCESS_PUBLIC;
	$group_invite->email = $email;
	$group_invite->save();

	elgg_set_ignore_access($ia);

	return $group_invite;
}

/**
 * Convert group invites to group invitations and friend requests
 *
 * @param string   $hook "create"
 * @param string   $type "user"
 * @param ElggUser $user User entity
 * @return void
 */
function groups_invite_user_created_event($event, $type, $user) {

	$email = $user->email;
	$group_invite = groups_invite_get_group_invite($email, false);
	if (!$group_invite) {
		return;
	}

	$ia = elgg_set_ignore_access(true);

	$groups = new ElggBatch('elgg_get_entities_from_relationship', array(
		'types' => 'group',
		'relationship' => 'invited_to',
		'relationship_guid' => $group_invite->guid,
		'inverse_relationship' => false,
		'limit' => 0,
	));

	foreach ($groups as $group) {
		add_entity_relationship($group->guid, 'invited', $user->guid);
	}

	if (elgg_is_active_plugin('friend_request')) {
		// We don't want to make people friends automatically
		// Least we can do is create a friend request, so that the new user can confirm it
		$inviters = new ElggBatch('elgg_get_entities_from_relationship', array(
			'types' => 'group',
			'relationship' => 'invited_by',
			'relationship_guid' => $group_invite->guid,
			'inverse_relationship' => false,
			'limit' => 0,
		));

		foreach ($inviters as $inviter) {
			add_entity_relationship($inviter->guid, 'friendrequest', $user->guid);
		}
	}

	$group_invite->delete();
	
	elgg_set_ignore_access($ia);
}
