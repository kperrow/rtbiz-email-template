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
	add_filter( 'rthd_email_templates_settings', 'add_rthd_email_templates_settings', 10, 1 );
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
		'title'       => __( 'Ticket Created (Author)' ),
		'permissions' => $admin_cap,
		'subsection'  => true,
		'fields'      => array(
			array(
				'id'       => 'rthd_new_ticket_email_title',
				'type'     => 'text',
				'title'    => __( 'Subject' ),
				'subtitle' => __( 'Title when a new ticket is created' ),
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_author',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_body}' ),
				'default'     => 'Thank you for opening a new support ticket. We will look into your request and respond as soon as possible.<br/>{ticket_body}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_contacts',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author} and {ticket_body}' ),
				'default'     => 'A new support ticket created by <strong> {ticket_author} </strong>. You have been subscribed to this ticket.<br/>{ticket_body}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_group_notification',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_assignee}, {ticket_offerings} and {ticket_body}' ),
				'default'     => 'A new support ticket created by <strong> {ticket_author} </strong>. <br/>Ticket Assigned to <strong>{ticket_assignee}</strong>{ticket_offerings} {ticket_body}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_offerings} and {ticket_body}' ),
				'default'     => 'A new support ticket created by <strong> {ticket_author} </strong> is assigned to you. <br/></strong>{ticket_offerings} {ticket_body}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_new_ticket_created_subscriber',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_author}, {ticket_assignee}, {ticket_offerings} and {ticket_body}' ),
				'default'     => 'A new support ticket created by <strong>{ticket_author}</strong>. You have been subscribed to this ticket. <br/>Ticket Assigned to <strong>{ticket_assignee}</strong>{ticket_offerings} {ticket_body}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_add',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_author} and {followup_content}' ),
				'default'     => 'New Followup Added by <strong>{followup_author}</strong><hr style="color: #DCEAF5;" /><div style="display: inline-block">{followup_content}</div>',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_add_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_author} and {followup_content}' ),
				'default'     => '<br /> A private followup has been added by <strong>{followup_author}</strong>. Please go to ticket to view content.',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_deleted',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_deleted_by} and {followup_content}' ),
				'default'     => 'A Followup is deleted by <Strong>{followup_deleted_by}</Strong><hr style="color: #DCEAF5;" /><div  style="display: inline-block">{followup_content}</div>',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_deleted_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_deleted_by} and {followup_content}' ),
				'default'     => 'A Followup is deleted by <Strong>{followup_deleted_by}</Strong>',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_updated_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_updated_by}, {visibility_diff} and {followup_diff}' ),
				'default'     => '<div> A Followup Updated by <strong>{followup_updated_by}.</strong></div> <br/><div> The changes are as follows: </div><br/> {visibility_diff} {followup_diff}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_followup_updated_private',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {followup_updated_by} and {visibility_diff} ' ),
				'default'     => '<div><br /> A <strong>private</strong> followup has been edited by <strong>{followup_updated_by}</strong>. Please go to ticket to view content.</div> {visibility_diff}',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_ticket_subscribed',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_subscribers}' ),
				'default'     => '{ticket_subscribers} have been subscribed to this ticket',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_ticket_unsubscribed',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_unsubscribers}' ),
				'default'     => '{ticket_unsubscribers} have been un-subscribed to this ticket',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_ticket_reassigned_old_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails.' ),
				'default'     => 'You are no longer responsible for this ticket.',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_ticket_reassigned_new_assignee',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {new_ticket_assignee}' ),
				'default'     => 'A ticket is reassigned to {new_ticket_assignee}.',
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
				'default'  => '{ticket_title}',
			),
			array(
				'id'          => 'rthd_email_template_ticket_updated',
				'type'        => 'editor',
				'title'       => __( 'Body' ),
				'subtitle'    => __( 'Helpdesk will use this email template' ),
				'desc'        => __( 'Helpdesk will use this email template for sending emails, you can use placeholder {ticket_updated_by} and {ticket_diference}' ),
				'default'     => '<br /> Ticket updated by : <strong>{ticket_updated_by}</strong><br/>. {ticket_diference}',
			)
		) );

	return $email_template_tab;

}