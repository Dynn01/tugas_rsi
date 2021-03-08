<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #navigation li {font-size:15px;font-weight:700;text-transform:uppercase;}
nav {display:inline-block;width:100%;border-bottom: #E5E5E5 2px solid;background:#fff}
nav .show-menu,nav li a{text-decoration:none;text-align:center}
nav ul{list-style-type:none;margin:0;padding:0;display:flex;align-items:center;justify-content:center}
nav li{display:inline-block; float:left;}
nav li a {display:block;height:50px;line-height:50px;color:#222;font-weight:700}
nav li a:link {color:#222 !important}
nav li a.drop:after {content:"=";margin-left:15px}
nav li:hover a,nav li:hover ul a:hover{background:#19c589;color:#fff}
nav li:hover ul a{background:#f3f3f3;color:#2f3036;height:40px;line-height:40px}
nav li ul{opacity:0;position:absolute;display:none;}
nav li ul li{display:list-item;float:none;position:relative}
nav li ul li a{width:auto;min-width:100px;padding:0 20px}
.hidden:hover,nav ul li a:hover+.hidden{opacity:1;display:block;z-index:1000}
nav .show-menu{color:#fff;background:#19c589;padding:10px 0;display:none}
nav input[type=checkbox]{display:none;-webkit-appearance:none}
nav input[type=checkbox]:checked~#menu{display:block}
@media screen and (min-width :760px){
nav li a {padding:0 30px;}
}
@media screen and (max-width :760px){
nav .show-menu,nav li ul li{display:block}
nav ul{position:static;display:none}
nav li a,nav ul li{width:100%;background:#eaeaea}
nav li ul{position:initial;display:none}
nav li ul li{position:relative}
}
</style>
<body>
    <nav>
        <label class='show-menu' for='show-menu'>Show Menu</label>
        <input id='show-menu' role='button' type='checkbox'/>
        <ul id='menu'>
        <li>
        <a class='drop'>Dropdown 1</a>
        <ul class='hidden'>
        <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_masuk">Submenu Dropdown 1.1</a></li>
        <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_keluar">Submenu Dropdown 1.2</a></li>
        </ul>
        </li>
        <li>
        <a class='drop'>Dropdown 2</a>
        <ul class='hidden'>
        <li><a href='#'>Submenu Dropdown 2.1</a></li>
        <li><a href='#'>Submenu Dropdown 2.2</a></li>
        </ul>
        </li>
        </ul>
        </nav>
</body>
</html>