<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./../3-proteccion/acceso-denegado.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./../3-proteccion/acceso-denegado.php');
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="iso-8859-1">
<title>Panel de Socios</title>
<meta name="generator" content="WYSIWYG Web Builder - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
div#container
{
   width: 1024px;
   position: relative;
   margin: 0 auto 0 auto;
   text-align: left;
}
body
{
   background-color: #FFFFFF;
   color: #000000;
   font-family: Arial;
   font-weight: normal;
   font-size: 11px;
   line-height: 1.1875;
   margin: 0;
   text-align: center;
}
</style>
<link href="css/font-awesome.min.css" rel="stylesheet">
<style>
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
input:focus, textarea:focus, select:focus
{
   outline: none;
}
#masterHeader
{
   background-color: #777777;
   background-image: none;
   box-sizing: border-box;
   margin: 0;
}
#wb_masterText2 
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #000000;
   padding: 0;
   margin: 0;
   text-align: center;
}
#wb_masterText2 div
{
   text-align: center;
}
#wb_masterHeading1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #000000;
   margin: 0;
   padding: 0;
   text-align: left;
}
#masterHeading1
{
   color: #FFFFFF;
   font-family: Arial;
   font-weight: bold;
   font-size: 32px;
   margin: 0;
   text-align: left;
}
#masterHeading1 a
{
   color: #FFFFFF;
   text-decoration: none;
}
#wb_masterGrid1
{
   clear: both;
   position: relative;
   table-layout: fixed;
   display: table;
   text-align: center;
   width: 100%;
   background-color: #3E78B3;
   background-image: none;
   border: 0px solid #CCCCCC;
   box-sizing: border-box;
   margin: 0;
}
#masterGrid1
{
   box-sizing: border-box;
   padding: 10px 0px 10px 0px;
   margin-right: auto;
   margin-left: auto;
}
#masterGrid1 .row
{
   margin-right: 0;
   margin-left: 0;
}
#masterGrid1 > .row > .col-1
{
   box-sizing: border-box;
   font-size: 0px;
   min-height: 1px;
   padding-right: 0px;
   padding-left: 0px;
   position: relative;
}
#masterGrid1 > .row > .col-1
{
   float: left;
}
#masterGrid1 > .row > .col-1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 100%;
   text-align: left;
}
#masterGrid1:before,
#masterGrid1:after,
#masterGrid1 .row:before,
#masterGrid1 .row:after
{
   display: table;
   content: " ";
}
#masterGrid1:after,
#masterGrid1 .row:after
{
   clear: both;
}
@media (max-width: 480px)
{
#masterGrid1 > .row > .col-1
{
   float: none;
   width: 100%;
}
}
#wb_ResponsiveMenu1
{
   background-color: rgba(66,66,66,1.00);
   display: block;
   font-family: Arial;
   font-weight: normal;
   text-align: center;
   width: 100%;
}
#ResponsiveMenu1
{
   background-color: #424242;
   display: inline-block;
   height: 44px;
}
#wb_ResponsiveMenu1 ul
{
   list-style: none;
   margin: 0;
   padding: 0;
   position: relative;
}
#wb_ResponsiveMenu1 ul:after
{
   clear: both;
   content: "";
   display: block;
}
#wb_ResponsiveMenu1 ul li
{
   background-color: #424242;
   display: list-item;
   float: left;
   list-style: none;
   z-index: 9999;
}
#wb_ResponsiveMenu1 ul li i
{
   font-size: 10px;
   width: 10px;
}
#wb_ResponsiveMenu1 ul li a 
{
   color: #FFFFFF;
   font-family: Arial;
   font-weight: normal;
   font-size: 12px;
   font-style: normal;
   padding: 12px 10px 8px 12px;
   text-align: center;
   text-decoration: none;
}
#wb_ResponsiveMenu1 > ul > li > a 
{
   height: 24px;
}
.ResponsiveMenu1 a 
{
   display: block;
}
#wb_ResponsiveMenu1 li a:hover, #wb_ResponsiveMenu1 li .active
{ 
   background-color: #CCCCCC;
   color: #424242;
}
#wb_ResponsiveMenu1 ul ul
{
   display: none;
   position: absolute;
   top: 44px;
}
#wb_ResponsiveMenu1 ul li:hover > ul
{
   display: list-item;
}
#wb_ResponsiveMenu1 ul ul li 
{
   background-color: #7A7A7A;
   color: #FFFFFF;
   float: none;
   position: relative;
   width: 180px;
}
#wb_ResponsiveMenu1 ul ul li a:hover, #wb_ResponsiveMenu1 ul ul li .active
{
   background-color: #CCCCCC;
   color: #424242;
}
#wb_ResponsiveMenu1 ul ul li i 
{
   margin-right: 3px;
   vertical-align: middle;
}
#wb_ResponsiveMenu1 ul ul li a 
{
   color: #FFFFFF;
   padding: 8px 15px 8px 10px;
   text-align: left;
   vertical-align: middle;
}
#wb_ResponsiveMenu1 ul ul ul li 
{
   left: 180px;
   position: relative;
   top: -44px;
}
#wb_ResponsiveMenu1 .arrow-down 
{
   display: inline-block;
   width: 0;
   height: 0;
   margin-left: 2px;
   vertical-align: middle;
   border-top: 4px solid #FFFFFF;
   border-right: 4px solid transparent;
   border-left: 4px solid transparent;
   border-bottom: 0 dotted;
}
#wb_ResponsiveMenu1 .arrow-left 
{
   display: inline-block;
   width: 0;
   height: 0;
   margin-left: 4px;
   vertical-align: middle;
   border-left: 4px solid #FFFFFF;
   border-top: 4px solid transparent;
   border-bottom: 4px solid transparent;
   border-right: 0 dotted;
}
#wb_ResponsiveMenu1 li a:hover .arrow-down
{ 
   border-top-color: #424242;
}
#wb_ResponsiveMenu1 ul ul li a:hover .arrow-left, #wb_ResponsiveMenu1 ul ul li .active .arrow-left
{ 
   border-left-color: #424242;
}
#wb_ResponsiveMenu1 .toggle,[id^=ResponsiveMenu1-submenu]
{
   display: none;
}
@media all and (max-width:1024px) 
{
#wb_ResponsiveMenu1 
{
   margin: 0;
   text-align: left;
}
#wb_ResponsiveMenu1 ul li a, #wb_ResponsiveMenu1 .toggle
{
   font-size: 12px;
   font-weight: normal;
   font-style: normal;
   padding: 8px 15px 8px 10px;
}
#wb_ResponsiveMenu1 .toggle + a
{
   display: none !important;
}
.ResponsiveMenu1 
{
   display: none;
   z-index: 9999;
}
#ResponsiveMenu1 
{
   background-color: transparent;
   display: none;
}
#wb_ResponsiveMenu1 > ul > li > a 
{
   height: auto;
}
#wb_ResponsiveMenu1 .toggle 
{
   display: block;
   background-color: #424242;
   color: #FFFFFF;
   padding: 0px 15px 0px 10px;
   line-height: 31px;
   text-decoration: none;
   border: none;
   position: relative;
}
#wb_ResponsiveMenu1 .toggle:hover 
{
   background-color: #CCCCCC;
   color: #424242;
}
[id^=ResponsiveMenu1-submenu]:checked + ul 
{
   display: block !important;
}
#ResponsiveMenu1-title
{
   height: 44px;
   line-height: 44px !important;
   text-align: center;
}
#wb_ResponsiveMenu1 ul li 
{
   display: block;
   width: 100%;
   text-align: left;
}
#wb_ResponsiveMenu1 ul ul .toggle,
#wb_ResponsiveMenu1 ul ul a 
{
   padding: 0 20px;
}
#wb_ResponsiveMenu1 a:hover,
#wb_ResponsiveMenu1 ul ul ul a 
{
   background-color: #7A7A7A;
   color: #FFFFFF;
}
#wb_ResponsiveMenu1 ul li ul li .toggle,
#wb_ResponsiveMenu1 ul ul a 
{
   background-color: #7A7A7A;
   color: #FFFFFF;
}
#wb_ResponsiveMenu1 ul ul ul a 
{
   padding: 8px 15px 8px 30px;
}
#wb_ResponsiveMenu1 ul li a 
{
   text-align: left;
}
#wb_ResponsiveMenu1 ul li a br 
{
   display: none;
}
#wb_ResponsiveMenu1 ul li i 
{
   margin-right: 3px;
}
#wb_ResponsiveMenu1 ul ul 
{
   float: none;
   position: static;
}
#wb_ResponsiveMenu1 ul ul li:hover > ul,
#wb_ResponsiveMenu1 ul li:hover > ul 
{
   display: none;
}
#wb_ResponsiveMenu1 ul ul li 
{
   display: block;
   width: 100%;
}
#wb_ResponsiveMenu1 ul ul ul li 
{
   position: static;
}
#ResponsiveMenu1-icon 
{
   display: block;
   position: absolute;
   left: 12px;
   top: 10px;
}
#ResponsiveMenu1-icon span 
{
   display: block;
   margin-top: 4px;
   height: 2px;
   background-color: #FFFFFF;
   color: #FFFFFF;
   width: 24px;
}
#wb_ResponsiveMenu1 ul li ul li .toggle:hover
{
   background-color: #CCCCCC;
   color: #424242;
}
#wb_ResponsiveMenu1 .toggle .arrow-down 
{
   border-top-color: #FFFFFF;
}
#wb_ResponsiveMenu1 .toggle:hover .arrow-down, #wb_ResponsiveMenu1 li .active .arrow-down
{ 
   border-top-color: #424242;
}
#wb_ResponsiveMenu1 ul li ul li .toggle .arrow-down 
{
   border-top-color: #FFFFFF;
}
#wb_ResponsiveMenu1 ul li ul li .toggle:hover .arrow-down, #wb_ResponsiveMenu1 ul li ul li .active .arrow-down
{ 
   border-top-color: #424242;
}
}
#masterFooter
{
   background-color: #366A9E;
   background-image: none;
   box-sizing: border-box;
   margin: 0;
}
#wb_Text4 
{
   background-color: transparent;
   background-image: none;
   border: 0px solid transparent;
   padding: 0;
   margin: 0;
   text-align: justify;
}
#wb_Text4 div
{
   text-align: justify;
}
#wb_LayoutGrid4
{
   clear: both;
   position: relative;
   table-layout: fixed;
   display: table;
   text-align: center;
   width: 100%;
   background-color: transparent;
   background-image: none;
   border: 0px solid #CCCCCC;
   box-sizing: border-box;
   margin: 0;
}
#LayoutGrid4
{
   box-sizing: border-box;
   padding: 20px 15px 20px 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 1280px;
}
#LayoutGrid4 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid4 > .row > .col-1
{
   box-sizing: border-box;
   font-size: 0px;
   min-height: 1px;
   padding-right: 15px;
   padding-left: 15px;
   position: relative;
}
#LayoutGrid4 > .row > .col-1
{
   float: left;
}
#LayoutGrid4 > .row > .col-1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 100%;
   text-align: left;
}
#LayoutGrid4:before,
#LayoutGrid4:after,
#LayoutGrid4 .row:before,
#LayoutGrid4 .row:after
{
   display: table;
   content: " ";
}
#LayoutGrid4:after,
#LayoutGrid4 .row:after
{
   clear: both;
}
@media (max-width: 480px)
{
#LayoutGrid4 > .row > .col-1
{
   float: none;
   width: 100%;
}
}
#wb_LayoutGrid2
{
   clear: both;
   position: relative;
   table-layout: fixed;
   display: table;
   text-align: center;
   width: 100%;
   background-color: transparent;
   background-image: none;
   border: 0px solid #CCCCCC;
   box-sizing: border-box;
   margin: 0;
}
#LayoutGrid2
{
   box-sizing: border-box;
   padding: 20px 15px 20px 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 1280px;
}
#LayoutGrid2 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid2 > .row > .col-1
{
   box-sizing: border-box;
   font-size: 0px;
   min-height: 1px;
   padding-right: 15px;
   padding-left: 15px;
   position: relative;
}
#LayoutGrid2 > .row > .col-1
{
   float: left;
}
#LayoutGrid2 > .row > .col-1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 100%;
   text-align: center;
}
#LayoutGrid2:before,
#LayoutGrid2:after,
#LayoutGrid2 .row:before,
#LayoutGrid2 .row:after
{
   display: table;
   content: " ";
}
#LayoutGrid2:after,
#LayoutGrid2 .row:after
{
   clear: both;
}
@media (max-width: 480px)
{
#LayoutGrid2 > .row > .col-1
{
   float: none;
   width: 100%;
}
}
#wb_LayoutGrid3
{
   clear: both;
   position: relative;
   table-layout: fixed;
   display: table;
   text-align: center;
   width: 100%;
   background-color: transparent;
   background-image: none;
   border: 0px solid #CCCCCC;
   box-sizing: border-box;
   margin: 0;
}
#LayoutGrid3
{
   box-sizing: border-box;
   padding: 20px 15px 20px 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 1280px;
}
#LayoutGrid3 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid3 > .row > .col-1, #LayoutGrid3 > .row > .col-2, #LayoutGrid3 > .row > .col-3
{
   box-sizing: border-box;
   font-size: 0px;
   min-height: 1px;
   padding-right: 15px;
   padding-left: 15px;
   position: relative;
}
#LayoutGrid3 > .row > .col-1, #LayoutGrid3 > .row > .col-2, #LayoutGrid3 > .row > .col-3
{
   float: left;
}
#LayoutGrid3 > .row > .col-1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 33.33333333%;
   text-align: left;
}
#LayoutGrid3 > .row > .col-2
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 33.33333333%;
   text-align: left;
}
#LayoutGrid3 > .row > .col-3
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #FFFFFF;
   width: 33.33333333%;
   text-align: left;
}
#LayoutGrid3:before,
#LayoutGrid3:after,
#LayoutGrid3 .row:before,
#LayoutGrid3 .row:after
{
   display: table;
   content: " ";
}
#LayoutGrid3:after,
#LayoutGrid3 .row:after
{
   clear: both;
}
@media (max-width: 480px)
{
#LayoutGrid3 > .row > .col-1, #LayoutGrid3 > .row > .col-2, #LayoutGrid3 > .row > .col-3
{
   float: none;
   width: 100%;
}
}
#wb_Image1
{
   height: 100%;
   margin: 0;
   vertical-align: top;
}
#Image1
{
   border: 0px solid #000000;
   box-sizing: border-box;
   padding: 0;
   display: block;
   width: 100%;
   height: 100%;
   vertical-align: top;
   object-fit: contain;
}
#wb_Image2
{
   height: 100%;
   margin: 0px 0px 20px 0px;
   vertical-align: top;
}
#Image2
{
   border: 0px solid #000000;
   box-sizing: border-box;
   padding: 0;
   display: block;
   width: 100%;
   height: 100%;
   vertical-align: top;
   object-fit: contain;
}
#wb_Image3
{
   height: 100%;
   margin: 0px 0px 20px 0px;
   vertical-align: top;
}
#Image3
{
   border: 0px solid #000000;
   box-sizing: border-box;
   padding: 0;
   display: block;
   width: 100%;
   height: 100%;
   vertical-align: top;
   object-fit: contain;
}
#wb_Image4
{
   height: 100%;
   margin: 0px 0px 20px 0px;
   vertical-align: top;
}
#Image4
{
   border: 0px solid #000000;
   box-sizing: border-box;
   padding: 0;
   display: block;
   width: 100%;
   height: 100%;
   vertical-align: top;
   object-fit: contain;
}
#masterFooter
{
   background-color: #366A9E;
   background-image: none;
   box-sizing: border-box;
   margin: 0;
}
#wb_Image1
{
   display: inline-block;
   width: 100%;
   height: auto;
   z-index: 4;
}
#wb_Image2
{
   display: inline-block;
   width: 100%;
   height: auto;
   z-index: 6;
}
#wb_Image3
{
   display: inline-block;
   width: 100%;
   height: auto;
   z-index: 7;
}
#wb_masterHeading1
{
   position: absolute;
   left: 20px;
   top: 26px;
   width: 179px;
   height: 41px;
   z-index: 0;
}
#wb_Image4
{
   display: inline-block;
   width: 100%;
   height: auto;
   z-index: 8;
}
#masterFooter_Container
{
   width: 970px;
   position: relative;
   margin-left: auto;
   margin-right: auto;
   text-align: left;
}
#masterFooter
{
   display: inline-block;
   position: relative;
   overflow: hidden;
   text-align: center;
   width: 100%;
   height: 76px;
   z-index: 12;
}
#wb_masterText2
{
   position: absolute;
   left: 335px;
   top: 30px;
   width: 300px;
   height: 16px;
   text-align: center;
   z-index: 9;
}
#wb_ResponsiveMenu1
{
   display: inline-block;
   width: 100%;
   z-index: 1;
}
#masterHeader
{
   display: block;
   position: relative;
   text-align: left;
   width: 100%;
   height: 92px;
   z-index: 7777;
}
@media only screen and (max-width: 1023px)
{
div#container
{
   width: 480px;
}
body
{
   background-color: #FFFFFF;
   background-image: none;
}
#MasterPage1
{
   left: 0px;
   top: 0px;
   width: 480px;
   height: 379px;
   visibility: visible;
   display: inline;
}
#masterHeader
{
   height: 92px;
   visibility: visible;
   font-size: 8px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: #777777;
   background-image: none;
}
#masterHeader
{
   width: 100%;
}
#wb_masterText2
{
   left: 81px;
   top: 30px;
   width: 300px;
   height: 16px;
   visibility: visible;
   display: inline;
   font-size: 8px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
}
#wb_masterText2
{
   margin: 0;
   padding: 0;
}
#wb_masterHeading1
{
   left: 20px;
   top: 26px;
   width: 179px;
   height: 41px;
   visibility: visible;
   display: inline;
   color: #FFFFFF;
   font-size: 32px;
   font-family: Arial;
   font-weight: bold;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
   margin: 0;
   padding: 0;
}
#wb_masterHeading1
{
   background-color: transparent;
   background-image: none;
   border: 0px solid #000000;
   text-align: left;
}
#masterHeading1
{
   color: #FFFFFF;
   font-family: Arial;
   font-weight: bold;
   font-size: 32px;
}
#masterHeading1 a
{
   color: #FFFFFF;
}
#wb_masterGrid1
{
   visibility: visible;
   display: table;
   font-size: 11px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: #3E78B3;
   background-image: none;
}
#wb_masterGrid1
{
   margin-top: 0px;
   margin-bottom: 0px;
}
#masterGrid1
{
   padding: 10px 0px 10px 0px;
}
#masterGrid1 .row
{
   margin-right: -0px;
   margin-left: -0px;
}
#masterGrid1 > .row > .col-1
{
   padding-right: 0px;
   padding-left: 0px;
}
#masterGrid1 > .row > .col-1
{
   display: block;
   width: 100%;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#wb_ResponsiveMenu1
{
   width: calc(100% - 0px);
   visibility: visible;
   display: block;
   margin: 0;
   text-align: center;
}
#masterFooter
{
   height: 76px;
   visibility: visible;
   font-size: 8px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: #366A9E;
   background-image: none;
}
#masterFooter
{
   width: 100%;
}
#masterFooter_Container
{
   width: 480px;
}
#wb_Text4
{
   visibility: visible;
   display: block;
   font-size: 8px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
}
#wb_Text4
{
   margin: 0;
   padding: 0;
}
#wb_LayoutGrid4
{
   visibility: visible;
   display: table;
   font-size: 11px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
}
#wb_LayoutGrid4
{
   margin-top: 0px;
   margin-bottom: 0px;
}
#LayoutGrid4
{
   padding: 20px 15px 20px 15px;
}
#LayoutGrid4 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid4 > .row > .col-1
{
   padding-right: 15px;
   padding-left: 15px;
}
#LayoutGrid4 > .row > .col-1
{
   display: block;
   width: 100%;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#wb_LayoutGrid2
{
   visibility: visible;
   display: table;
   font-size: 11px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
}
#wb_LayoutGrid2
{
   margin-top: 0px;
   margin-bottom: 0px;
}
#LayoutGrid2
{
   padding: 20px 15px 20px 15px;
}
#LayoutGrid2 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid2 > .row > .col-1
{
   padding-right: 15px;
   padding-left: 15px;
}
#LayoutGrid2 > .row > .col-1
{
   display: block;
   width: 100%;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#wb_LayoutGrid3
{
   visibility: visible;
   display: table;
   font-size: 11px;
   font-family: Arial;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   background-color: transparent;
   background-image: none;
}
#wb_LayoutGrid3
{
   margin-top: 0px;
   margin-bottom: 0px;
}
#LayoutGrid3
{
   padding: 20px 15px 20px 15px;
}
#LayoutGrid3 .row
{
   margin-right: -15px;
   margin-left: -15px;
}
#LayoutGrid3 > .row > .col-1, #LayoutGrid3 > .row > .col-2, #LayoutGrid3 > .row > .col-3
{
   padding-right: 15px;
   padding-left: 15px;
}
#LayoutGrid3 > .row > .col-1
{
   display: block;
   width: 100%;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#LayoutGrid3 > .row > .col-2
{
   display: block;
   width: 100%;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#LayoutGrid3 > .row > .col-3
{
   display: none;
   border: 0px solid #FFFFFF;
   border-radius: 0px;
   text-align: left;
}
#wb_Image1
{
   width: calc(100% - 0px);
   visibility: visible;
   display: block;
   margin: 0;
   padding: 0;
}
#wb_Image2
{
   width: calc(100% - 0px);
   visibility: visible;
   display: block;
   margin: 0px 0px 20px 0px;
   padding: 0;
}
#wb_Image3
{
   width: calc(100% - 0px);
   visibility: visible;
   display: block;
   margin: 0px 0px 20px 0px;
   padding: 0;
}
#wb_Image4
{
   width: calc(100% - 0px);
   visibility: visible;
   display: block;
   margin: 0px 0px 20px 0px;
   padding: 0;
}
#ProtectedPage1
{
   left: 1040px;
   top: 120px;
   width: 126px;
   height: 48px;
   visibility: visible;
   display: inline;
}
}
</style>
<script src="java scrit/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function()
{
   $("#wb_ResponsiveMenu1 ul li a").click(function(event)
   {
      $("#wb_ResponsiveMenu1 input").prop("checked", false);
   });
});
</script>
</head>
<body>
<header id="masterHeader">
<div id="wb_masterHeading1">
<h1 id="masterHeading1"><a href="./inde-panel-de-socio.php">Bienvenido </a></h1></div>
</header>
<div id="wb_masterGrid1">
<div id="masterGrid1">
<div class="row">
<div class="col-1">
<div id="wb_ResponsiveMenu1">
<label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Menu<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
<input type="checkbox" id="ResponsiveMenu1-submenu">
<ul class="ResponsiveMenu1" id="ResponsiveMenu1" role="menu">
<li><a role="menuitem" href="./../index.html"><i class="fa fa-home fa-2x">&nbsp;</i><br>Inicio</a></li>
<li>
<label for="ResponsiveMenu1-submenu-0" class="toggle"><i class="fa fa-sticky-note-o fa-2x">&nbsp;</i>La&nbsp;Asefran<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-sticky-note-o fa-2x">&nbsp;</i><br>La&nbsp;Asefran<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-0">
<ul role="menu">
<li><a role="menuitem" href="#">Organizacion</a></li>
<li><a role="menuitem" href="#">Noticias</a></li>
<li><a role="menuitem" href="#">Reglamentos</a></li>
<li><a role="menuitem" href="#">Actividades</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-1" class="toggle"><i class="fa fa-user fa-2x">&nbsp;</i>Configuracion&nbsp;de&nbsp;Cuenta<b class="arrow-down"></b></label>
<a role="menuitem" href="http://"><i class="fa fa-user fa-2x">&nbsp;</i><br>Configuracion&nbsp;de&nbsp;Cuenta<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-1">
<ul role="menu">
<li><a role="menuitem" href="http://">Cambio&nbsp;de&nbsp;Contrase&#241;a</a></li>
</ul>
</li>
<li><a role="menuitem" href="./../6-actas-de-asamblea/1-panel-actas/index-actas.php"><i class="fa fa-bars fa-2x">&nbsp;</i><br>Actas&nbsp;de&nbsp;Asamblea</a></li>
</ul>

</div>
</div>
</div>
</div>
</div>
<div id="container">


</div>
<div id="wb_LayoutGrid4">
<div id="LayoutGrid4">
<div class="row">
<div class="col-1">
<div id="wb_Image1">
<img src="images/placeholder1.jpg" id="Image1" alt="">
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid2">
<div id="LayoutGrid2">
<div class="row">
<div class="col-1">
<div id="wb_Text4">
<span style="color:#808080;font-family:Tahoma;font-size:13px;"><strong>June 21, 2018</strong><br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim liber veniam, quis nostrud exerci tation ullamcorper suscipit et lobortis nisl ut aliquip ex ea commodo consequat. Duis is autem vel eum iriure dolor in hendrerit in vulputate velit vel esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero et accumsan et iusto odio dignissim qui elit blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br><br>Lorem ipsum dolor sit amet, praesent consectetuer tation adipiscing elit, sed diam nonummy nibh nobis euismod ea tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation vel ullamcorper suscipit lobortis nisl ut aliquip ex ea duis iusto commodo consequat. Duis autem vel eum iriure dolor in ea hendrerit in vulputate velit esse molestie consequat, vel et illum dolore eu feugiat nulla facilisis at vero et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril nisl delenit augue duis dolore te feugait nulla facilisi.<br><br>Nam liber tempor cum soluta nobis eleifend option congue nihil odio imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer et adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper dolore suscipit eum ipsum lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate et velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero et accumsan.</span>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid3">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
<div id="wb_Image2">
<img src="images/placeholder2.jpg" id="Image2" alt="">
</div>
</div>
<div class="col-2">
<div id="wb_Image3">
<img src="images/placeholder2.jpg" id="Image3" alt="">
</div>
</div>
<div class="col-3">
<div id="wb_Image4">
<img src="images/placeholder2.jpg" id="Image4" alt="">
</div>
</div>
</div>
</div>
</div>
<footer id="masterFooter">
<div id="masterFooter_Container">
<div id="wb_masterText2">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Copyright 2018 - www.asefran.com.py</span></div>
</div>
</footer>
</body>
</html>