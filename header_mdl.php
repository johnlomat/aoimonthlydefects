<?php
	$logo = HOST_URL."/assets/images/logo/tri-logo.png";
	$title_icon = HOST_URL."/assets/images/table-title-icon.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Facebook meta tags -->
<meta property="og:url" content="http://aoimonthlydefects.herokuapp.com/" />
<meta property="og:type" content="website" />
<meta property="og:title" content="TRI AOI | Monthly Defects " />
<meta property="og:description" content="Develop a PHP web-based system that will record the detection of model product defects in AOI Machine." />
<meta property="og:image" content="http://aoimonthlydefects.herokuapp.com/assets/images/AOI-Monthly-Defects.png" />

<!-- Twitter meta tags -->
<meta property="twitter:url" content="http://aoimonthlydefects.herokuapp.com/" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="TRI AOI | Monthly Defects" />
<meta name="twitter:description" content="Develop a PHP web-based system that will record the detection of model product defects in AOI Machine." />
<meta name="twitter:image" content="http://aoimonthlydefects.herokuapp.com/assets/images/AOI-Monthly-Defects.png" />

<title><?= $title->Title() ?></title>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="icon" type="image/ico" href="<?= HOST_URL."/assets/images/favicon/favicon.ico" ?>" sizes="16x16">
<link rel="stylesheet" href="<?= $style->Style1() ?>">
<link rel="stylesheet" href="<?= $style->Style2() ?>">
<link rel="stylesheet" href="<?= HOST_URL."/assets/font/Roboto/font.css" ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?= HOST_URL."/assets/material.blue-indigo.min.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= HOST_URL."/assets/gijgo.min.css" ?>">
<script defer src="<?= HOST_URL."/assets/material.min.js" ?>"></script>
<script src="<?=HOST_URL."/assets/jquery-3.4.1.min.js" ?>"></script>
<script src="<?= HOST_URL."/assets/gijgo.min.js" ?>" type="text/javascript"></script>
<!--[if IE 9]>
  <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
<![endif]-->
<!--[if lte IE 8]>
  <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
<![endif]-->
<style>
* {
	margin: 0;
	padding: 0;
	font-family: "Roboto",Lato;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-khtml-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.004);
	text-decoration: none
}
a, img, .mdl-card__title > span, .background-alias, .row > h5, .mdl-tooltip, .material-icons, .percentage, .data-table > table > tbody > tr > td:last-child, .pagination {
	user-select: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none
}
button:hover {
	cursor: pointer
}
button:focus {
	border: none
}
button::-moz-focus-inner {
	border: 0
}
select:focus {
	border-bottom: 1px solid #2196F3
}
select:required:invalid {
	color: #BDBDBD
}
option[value=""][disabled] {
	color: #7E7778
}
option {
	color: black
}
.form {
	display: block;
	box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
	position: fixed;
	overflow: auto;
	top: -360px;
	transition: 0.3s;
	background: white;
	z-index: 6
}
.modal {
	display: none;
	position: fixed;
	z-index: 5;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	background-color: rgba(0,0,0,0.4);
	opacity: 0
}
.error {
	margin: 0;
	color: #D93025; 
	text-align: left
}
.error p {
	margin: 0
}
.error i {
	margin-right: 5px
}
/* Data table buttons */
.button-icon {
	display: none;
	background: none;
	border: none;
	opacity: 0;
	margin-left: 5px
}
.delete-button > i {
	vertical-align: middle;
	font-size: 1.2em!important;
	color: #D32F2F
}
.edit-button {
	margin-left: auto
}
.edit-button > i {
	vertical-align: middle;
	font-size: 1.2em!important;
	color: #4CAF50
}
.add-btn {
	position: fixed!important;
	bottom: 50px;
	right: 10px
}
.edit-btn {
	position: fixed!important;
	bottom: 120px;
	right: 10px
}
.close-edit {
	display: none;
	position: fixed!important;
	bottom: 120px;
	right: 10px
}
.button-blue {
	background: #2196F3!important
}
.button-green {
	background: #4CAF50!important
}
.button-red {
	background: #F44235!important
}
.button-purple {
	background: #683BB7!important
}
.no-color-button {
	font-size: 0.75em!important;
	color: #2476E8!important;
	margin: 0 15px 0 5px!important
}
.mdl-ripple {
	background: #448AFF!important
}
.mdl-button {
	z-index: 1
}
.no-color-button:active, .mdl-button__ripple-container:active {
	background: none!important
}
.mdl-button--raised[disabled][disabled], .mdl-button--raised.mdl-button--disabled.mdl-button--disabled {
	background-color: rgba(0,0,0,.12)!important;
	color: rgba(0,0,0,.26)!impotant;
	box-shadow: none!important
}
@media not all and (pointer: coarse) {
	.no-color-button:hover {
		background: #F6FAFE!important
	}
	.red-color-button:hover {
		background: #ffebee!important
	}
	.mdl-tooltip.is-active {
		-webkit-animation:pulse 200ms cubic-bezier(0,0,.2,1)forwards;
		animation:pulse 200ms cubic-bezier(0,0,.2,1)forwards
	}
}
</style>
</head>