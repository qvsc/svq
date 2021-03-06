<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* <style> /**/

/* **************************
	BUTTONS
************************** */
.elgg-button {
	font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
	color: #FFF;
	width: auto;
	padding: 5px 12px;
	cursor: pointer;
	background: #595959;
	border: 1px solid #333333; /* Fallback */
	border: 1px solid rgba(0, 0, 0, 0.2);

	border-radius: 3px;
	box-shadow: inset 0 0 1px rgba(255, 255, 255, 0.6);
}
a.elgg-button {
	padding: 6px 12px;
}
.elgg-button:hover,
.elgg-button:focus {
	background: #f47e3c;
	text-decoration: none;
	color: #FFF;
}
.elgg-button-submit.elgg-state-disabled {
	background: #DEDEDE;
	cursor: default;
}
.elgg-button-cancel {
	border: 1px solid #C88415; /* Fallback */
	border: 1px solid rgba(0, 0, 0, 0.2);
	background: #FAA51A;
}
.elgg-button-cancel:hover,
.elgg-button-cancel:focus {
	background: #E38F07;
}
.elgg-button-delete {
	border: 1px solid #CC2900; /* Fallback */
	border: 1px solid rgba(0, 0, 0, 0.2);
	background: #FF3300;
}
.elgg-button-delete:hover,
.elgg-button-delete:focus {
	background: #D63006;
}
.elgg-button-dropdown {
	background: none;
	text-decoration: none;
	display: block;
	position: relative;
	margin-left: 0;
	color: #FFF;
	border: none;
	box-shadow: none;
	border-radius: 0;
}
.elgg-button-dropdown:hover,
.elgg-button-dropdown:focus,
.elgg-button-dropdown.elgg-state-active {
	color: #FFF;
	background: #0e7c1b;
	text-decoration: none;
}
