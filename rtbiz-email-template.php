<?php

/**
 * Plugin Name: rtBiz Email Template
 * Plugin URI: http://rtcamp.com/
 * Description: A Addon for rtbiz email templates.
 * Version: 0.5
 * Author: rtCamp
 * Author URI: http://rtcamp.com
 * License: GPL
 * Text Domain: rtbiz-email-template
 * Contributors: Utkarsh<utkarsh.patel@rtcamp.com>
 */

if ( ! defined( 'RT_EMAIL_TEMPLATE_VERSION' ) ) {
	/**
	 * Defines RT_HD_VERSION if it does not exits.
	 *
	 * @since 0.1
	 */
	define( 'RT_EMAIL_TEMPLATE_VERSION', '0.5' );
}
if ( ! defined( 'RT_EMAIL_TEMPLATE_TEXT_DOMAIN' ) ) {
	/**
	 * Defines RT_HD_TEXT_DOMAIN if it does not exits.
	 *
	 * @since 0.1
	 */
	define( 'RT_EMAIL_TEMPLATE_TEXT_DOMAIN', 'rtbiz-email-template' );
}


add_action( 'rt_biz_init', 'rt_email_template_init', 1 );


function rt_email_template_init(){
	if ( function_exists( 'rthd_get_default_email_template' ) ){
		add_filter( 'rthd_email_templates_settings', 'add_rthd_email_templates_settings', 10, 1 );
	}
}

function add_rthd_email_templates_settings( $email_template_tab ){

	$admin_cap  = rt_biz_get_access_role_cap( RT_HD_TEXT_DOMAIN, 'admin' );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Email Templates' ),
		'permissions' => $admin_cap,
		'fields'      => array(
			) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Created (Creator)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
				'default'  => rthd_get_default_email_template('rthd_new_ticket_email_title'),
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_author',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_body}' ),
				'default'     =>  rthd_get_default_email_template('rthd_email_template_new_ticket_created_author'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Created (Contacts)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title_contacts',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
				'default'  => rthd_get_default_email_template('rthd_new_ticket_email_title_contacts'),
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_contacts',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author} and {ticket_body}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_new_ticket_created_contacts'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Created (Group)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title_group',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'default'  => rthd_get_default_email_template('rthd_new_ticket_email_title_group'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_group_notification',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_assignee}, {ticket_offerings} and {ticket_body}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_new_ticket_created_group_notification'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Created (Assignee)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title_assignee',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'default'  => rthd_get_default_email_template('rthd_new_ticket_email_title_assignee'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_offerings} and {ticket_body}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_new_ticket_created_assignee'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Created (Subscriber)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title_subscriber',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'default'  => rthd_get_default_email_template('rthd_new_ticket_email_title_subscriber'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_subscriber',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_assignee}, {ticket_offerings} and {ticket_body}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_new_ticket_created_subscriber'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Add' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_followup_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new follow up is added' ),
				'default'  => rthd_get_default_email_template('rthd_new_followup_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_add',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_author} and {followup_content}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_add'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Add (Private)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_followup_email_title_private',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new follow up is added' ),
				'default'  => rthd_get_default_email_template('rthd_new_followup_email_title_private'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_add_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_author} and {followup_content}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_add_private'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Delete' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_delete_followup_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a follow up is deleted' ),
				'default'  => rthd_get_default_email_template('rthd_delete_followup_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_deleted',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_deleted_by} and {followup_content}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_deleted'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Delete (Private)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_delete_followup_email_title_private',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a follow up is deleted' ),
				'default'  => rthd_get_default_email_template('rthd_delete_followup_email_title_private'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_deleted_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_deleted_by} and {followup_content}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_deleted_private'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Update' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_update_followup_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when an existing follow up is updated' ),
				'default'  => rthd_get_default_email_template('rthd_update_followup_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_updated',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_updated_by}, {visibility_diff} and {followup_diff}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_updated'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Followup Update (Private)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_update_followup_email_title_private',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when an existing follow up is updated' ),
				'default'  => rthd_get_default_email_template('rthd_update_followup_email_title_private'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_followup_updated_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_updated_by} and {visibility_diff} ' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_followup_updated_private'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Subscribed' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_ticket_subscribe_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a user subscribes to a ticket' ),
				'default'  => rthd_get_default_email_template('rthd_ticket_subscribe_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_ticket_subscribed',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_subscribers}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_ticket_subscribed'),
			)
		) );


	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Unsubscribed' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_ticket_unsubscribe_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a user unsubscribes to a ticket' ),
				'default'  => rthd_get_default_email_template('rthd_ticket_unsubscribe_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_ticket_unsubscribed',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_unsubscribers}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_ticket_unsubscribed'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Reassigned (old assignee)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_ticket_reassign_email_title_old_assignee',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when an existing ticket is reassigned to another user' ),
				'default'  => rthd_get_default_email_template('rthd_ticket_reassign_email_title_old_assignee'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_ticket_reassigned_old_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails.' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_ticket_reassigned_old_assignee'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Reassigned (new assignee)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_ticket_reassign_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when an existing ticket is reassigned to another user' ),
				'default'  => rthd_get_default_email_template('rthd_ticket_reassign_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_ticket_reassigned_new_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {new_ticket_assignee}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_ticket_reassigned_new_assignee'),
			)
		) );

	$email_template_tab[] = array(
		'icon'        => 'el-icon-edit',
		'title'       => __( 'Ticket Update' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_update_ticket_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a ticket is updated' ),
				'default'  => rthd_get_default_email_template('rthd_update_ticket_email_title'),
				'desc'        => __( 'You can use {module_name}, {ticket_id}, {ticket_title} and {offerings_name} placeholder in your title.' ),
			),
			array(
				'id'          => 'rthd_email_template_ticket_updated',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_updated_by} and {ticket_diference}' ),
				'default'     => rthd_get_default_email_template('rthd_email_template_ticket_updated'),
			)
		) );

	return $email_template_tab;

}