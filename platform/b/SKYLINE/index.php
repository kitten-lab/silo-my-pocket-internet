<?php 
// "Alice through the looking glass" //
require_once '_configs/clrRoutes.php';
require_once '_configs/asSelf_config.php';

$pageTitle = "THE SKYLINE ON-INTERA";
h1("This is the SKYLITE");

words($left, "Lets make this somehow meaningful. We will type words about 
Greenland and Wyoming and some place in Sauce a Leeto, which might house 
onions.", $colorize("darkblue"));

h2("This is the SKYLITE");

words($center, "Hello World and welcome to the first run of SKYlite, a new 
simple way to write basic pages!", $colorize("orange"));

getTool("plog.basic","Add");

h1("More titles!");

getImg("main.png");

require resolveShell($sys);
?>