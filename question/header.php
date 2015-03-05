<?php
session_start();
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');
?>
	<style>
body, p, h1, h2, h3{
color: #333;
font-family: sans-serif;
}


.table {
background: #bbbbbb;
width:290px;
}

.calcheading {
height:30px;
background: url(/images/navback.gif) repeat-x;
color: #ffffff;
font-size: 14px;
}

.calcrow {
height: 30px;
background: url(/images/even-odd-back.gif) repeat-x;
}

.calcrow2 {
height: 30px;
background: #ffffff;
}

.submit {
height: 30px;
background: #bababa;
}

.none { display:none; } 
.view { display:table-row; }

input[type=submit]{
	position:absolute; bottom:10;right:10;
	background-color: #7EBB14;
	border-radius: 4px;
	color: #FFF;
	font-weight: bold;
	text-decoration: none;
	text-transform: uppercase;
	text-align: center;
	padding: 7px 17px;
	font-size: 17px;
	background: none repeat scroll 0% 0% #7EBB14;
	transition: all 0.2s linear 0s;
}

input[type=button]{
	position:absolute; bottom:10;left:10;
	background-color: #7EBB14;
	border-radius: 4px;
	color: #FFF;
	font-weight: bold;
	text-decoration: none;
	text-transform: uppercase;
	text-align: center;
	padding: 7px 17px;
	font-size: 17px;
	background: none repeat scroll 0% 0% #7EBB14;
	transition: all 0.2s linear 0s;
}

input[type=submit]:hover {
    background: none repeat scroll 0% 0% #25BB28;
    text-decoration: none;
}
input[type=submit]:focus {
    outline: thin dotted #333;
    outline-offset: -2px;
}
input[type=submit]:hover, input[type=submit]:focus {
    color: #ddd;
    text-decoration: underline;
}
input[type=submit]:active, input[type=submit]:hover {
    outline: 0px none;
}
input[type=submit]:focus {
    outline: thin dotted;
}
input[type=button]:hover {
    background: none repeat scroll 0% 0% #25BB28;
    text-decoration: none;
}
input[type=button]:focus {
    outline: thin dotted #333;
    outline-offset: -2px;
}
input[type=button]:hover, input[type=button]:focus {
    color: #ddd;
    text-decoration: underline;
}
input[type=button]:active, input[type=button]:hover {
    outline: 0px none;
}
input[type=button]:focus {
    outline: thin dotted;
}
*, *:before, *:after {
    -moz-box-sizing: border-box;
}
td {
	border-bottom: solid 1px grey !important;
	margin-bottom:10px !important; 
}
#testbox{
	border-radius: 4px;
	color: #333;
	font-weight: bold;
	padding: 15px;
	font-size: 17px;
	background: none repeat scroll 0% 0% #fff;
	background-size: cover;
	transition: all 0.2s linear 0s;
	font-family: sans-serif;
	width:100%;
	height:100%;
	position:relative;
}
select {
	/* border: 1px inset black; */
	width: 320px;
	font-size: 0.8em;
}

/*
.sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
.sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: .9em; height: auto; }
.sortable li span { position: absolute; margin-left: -1.3em; }
.ui-state-highlight { height: 1.5em; line-height: 1.2em; }
.sortable-number { width: 25px;float: right;line-height: 1em;text-align: center; }
*/
</style>
<body>