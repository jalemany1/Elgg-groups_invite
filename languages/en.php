<?php

return [
	'groups:invite:settings:require_confirmation' => 'Require confirmation from invitees',
	'groups:invite:settings:require_confirmation:help' => 'Invited users must always accept invitation. When enabled, this feature will prevent group admins from adding users to the group without invitation',
	'groups:invite:settings:users_tab' => 'Allow any registered user to be invited',
	'groups:invite:settings:users_tab:help' => 'If enabled, users will be able to find and invite any registered user. If disabled, only friends can be invited',
	'groups:invite:settings:emails_tab' => 'Allow invitation by email',
	'groups:invite:settings:emails_tab:help' => 'If enabled, users will be able to invite other people via email',

	'groups:invite:friends' => 'Friends',
	'groups:invite:users' => 'Users',
	'groups:invite:emails' => 'Emails',
	'groups:invite:friends:select' => 'Friends to invite',
	'groups:invite:users:select' => 'Users to invite',
	'groups:invite:emails:select' => 'Emails to invite',
	'groups:invite:emails:select:help' => 'Enter one email per line',
	'groups:invite:message' => 'Message to include in the invitation',

	'groups:invite:resend' => 'Resend invitations to previously invited members',
	'groups:invite:action:invite' => 'Send invitation to become a member',
	'groups:invite:action:add' => 'Add as member without invitation',

	'groups:invite' => 'Invite',
	'groups:invite:title' => 'Invite members to this group',
	'groups:inviteto' => "Invite members to '%s'",

	'groups:invite:tool_option' => 'Allows members to invite other members',
	'groups:invite:not_found' => 'Group not found',

	'groups:invite:notify:subject' => 'You are invited to join %s',
	'groups:invite:notify:body' => '%1$s has invited you to join %2$s at %3$s.

		%4$s
		Please visit the following link to create an account:
		%5$s

		You will then be able to confirm the invitation to join %2$s by visiting your invitations page.
		',
	'groups:invite:notify:message' => '
		They have included the following message for you:
		%s

		',

	'groups:invite:user:subject' => "%s invites you to join %s",
	'groups:invite:user:body' => "Hi %s,

%s invited you to join '%s'. Click below to confirm the invitation:

%s",

	'groups:invite:result:invited' => '%s of %s invitations were successfully sent',
	'groups:invite:result:skipped' => '%s of %s invitations were skipped, because users have already been invited',
	'groups:invite:result:added' => '%s of %s users were added as group members',
	'groups:invite:result:error' => '%s of %s invitations could not be sent due to errors',

	'groups:invite:confirm:error' => 'Your request can not be complete. Please login and confirm the invitation manually',
	'notification:groups_invite_user' => 'Notification sent when a user is invited to a group',
	
];
