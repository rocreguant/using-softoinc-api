<?php /* Smarty version Smarty-3.1.7, created on 2012-02-02 09:26:00
         compiled from "E:\xampp\htdocs\project\application\template\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85374f2901d6f0c2f4-99926514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '733521867c2afabffd507a8b392567f8940ed564' => 
    array (
      0 => 'E:\\xampp\\htdocs\\project\\application\\template\\error.tpl',
      1 => 1328097828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85374f2901d6f0c2f4-99926514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2901d701a38',
  'variables' => 
  array (
    'programs' => 0,
    'program' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2901d701a38')) {function content_4f2901d701a38($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'E:\\xampp\\htdocs\\project\\application\\libs\\smarty\\plugins\\modifier.replace.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PHP Curs</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="">
    <link href="/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="page">
        <div id="header">
            <div id="logowrapper"> <a href="project.dev"><img id="logo" src="/images/logo.gif" alt=""></a>
                <h1><a href="#">PHP Curs</a></h1>
            </div>		   
            <div id="menu">
                <ul><li><a href="#">Homepage</a></li>
                </ul></div>
        </div><!-- header -->
		<div id="search">
			<form action="/search/" method="get">
				<input id="search-text" type="text" size="15" name="program">
				<input id="search-submit" type="submit" value="Buscar">
			</form>
		</div>
		<br />
        <div id="sidebar"><div id="sidebar2">
                <h2>Software más usado</h2>
                <ul>

					<!-- API call a getHotSoftware -->
					<?php  $_smarty_tpl->tpl_vars['program'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['program']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['programs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['program']->key => $_smarty_tpl->tpl_vars['program']->value){
$_smarty_tpl->tpl_vars['program']->_loop = true;
?>
						<li><a href="/program/<?php echo $_smarty_tpl->tpl_vars['program']->value['program']['id_program'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['program']->value['program']['title'],' ','-');?>
"><?php echo $_smarty_tpl->tpl_vars['program']->value['program']['title'];?>
</a></li>
					<?php } ?>
					<!-- fi -->
                </ul>
            </div>
		</div><!-- sidebar --><!-- sidebar2 -->        

<!-- Posts o resultats, en definitiva el contingut -->		
        <div id="content">  

					<div class="post">
						<h2> Woops, no hem trobat el que buscaves </h2>
					</div><!-- post -->			              
        </div><!-- content -->
        <div class="clearing"> </div>
        <div id="footer">
            <p>Copyright © 2012, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a><span> | </span><a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
        </div>
    </div><!-- page -->
</body></html>
<?php }} ?>