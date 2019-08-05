<?php

/*
  Template Name: Technical Notes Template
*/

	get_template_part('includes/header');

		// Top Hero
		get_template_part('includes/general/_hero-top');

		// Notes
		get_template_part('includes/loops/content', 'notes'); 

	get_template_part('includes/footer');