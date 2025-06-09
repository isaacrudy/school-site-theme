<?php
// This file is generated. Do not modify it manually.
return array(
	'student-list' => array(
		'apiVersion' => 2,
		'name' => 'mytheme/student-list',
		'title' => 'Student List',
		'category' => 'widgets',
		'icon' => 'groups',
		'description' => 'Displays a list of students with featured images and roles.',
		'supports' => array(
			'html' => false
		),
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'text-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'custom-blocks/text-slider',
		'version' => '0.1.0',
		'title' => 'Text Slider',
		'category' => 'text',
		'icon' => 'smiley',
		'description' => 'Animates Text to slide into frame',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'direction' => array(
				'type' => 'string',
				'default' => 'fade-up'
			),
			'content' => array(
				'type' => 'string',
				'default' => 'Input your text here...'
			)
		),
		'textdomain' => 'text-slider',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	)
);
