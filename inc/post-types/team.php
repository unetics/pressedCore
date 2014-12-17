<?php
$team = tr_post_type('Person', 'Team', array('supports' => array('title')));
$team->id = 'team';
$team->icon('users');
$team->title = 'Enter Persons Full Name';
$team->form['editor'] = true; // set

function add_form_content_team_editor() {
$form = tr_form();
$form->editor('About / Bio');
$form->date('Date of Birth');
$form->image('Photo');
}