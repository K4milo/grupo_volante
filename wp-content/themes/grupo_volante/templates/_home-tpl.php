<?php

/*
  Template Name: Home Template
*/

get_template_part('includes/header');

	// Top Hero
	get_template_part('includes/general/_hero-top');

	// Services Loop
	get_template_part('includes/loops/loop','services');

	// Partners Loop
	get_template_part('includes/loops/loop','partners');
	

get_template_part('includes/footer');