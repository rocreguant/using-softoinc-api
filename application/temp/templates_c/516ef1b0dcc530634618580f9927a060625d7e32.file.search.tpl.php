<?php /* Smarty version Smarty-3.1.7, created on 2012-02-02 13:34:52
         compiled from "E:\xampp\htdocs\project\application\template\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154674f29244a91d661-63531497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '516ef1b0dcc530634618580f9927a060625d7e32' => 
    array (
      0 => 'E:\\xampp\\htdocs\\project\\application\\template\\search.tpl',
      1 => 1328186087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154674f29244a91d661-63531497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f29244a94a55',
  'variables' => 
  array (
    'programs' => 0,
    'program' => 0,
    'platforms' => 0,
    'platform' => 0,
    'programa' => 0,
    'actual' => 0,
    'results' => 0,
    'result' => 0,
    'before' => 0,
    'bool' => 0,
    'after' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f29244a94a55')) {function content_4f29244a94a55($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'E:\\xampp\\htdocs\\project\\application\\libs\\smarty\\plugins\\modifier.replace.php';
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

			<b> Plataforma: </b> <br/>
                        <?php  $_smarty_tpl->tpl_vars['platform'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['platform']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['platforms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['platform']->key => $_smarty_tpl->tpl_vars['platform']->value){
$_smarty_tpl->tpl_vars['platform']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['platform']->value['platform']['name']!='Web Apps'&&$_smarty_tpl->tpl_vars['platform']->value['platform']['name']!='Palm OS'&&$_smarty_tpl->tpl_vars['platform']->value['platform']['name']!='Pocket PC'){?>
                                <a href="/search/?program=<?php echo $_smarty_tpl->tpl_vars['programa']->value;?>
&pag=<?php echo $_smarty_tpl->tpl_vars['actual']->value;?>
&platform=<?php echo mb_strtolower($_smarty_tpl->tpl_vars['platform']->value['platform']['name'], 'UTF-8');?>
"> <?php echo $_smarty_tpl->tpl_vars['platform']->value['platform']['name'];?>
 </a> <br/>
                            <?php }?>
                        <?php } ?>   
                         <?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['result']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
$_smarty_tpl->tpl_vars['result']->_loop = true;
?>
				<div class="post">
					<h2><a href="/program/<?php echo $_smarty_tpl->tpl_vars['result']->value['id_program'];?>
/<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['result']->value['name'],' ','-');?>
"> <?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</a></h2>
					<div class="entry">
						Plataforma: <?php echo $_smarty_tpl->tpl_vars['result']->value['platform_name'];?>
 <br/>
						Licencia: <?php echo $_smarty_tpl->tpl_vars['result']->value['license'];?>
 <br/>
						Rating: <?php echo $_smarty_tpl->tpl_vars['result']->value['softonic_rating'];?>
 <br/>
						<p> Descripción: <?php echo $_smarty_tpl->tpl_vars['result']->value['description'];?>
</p>
						<a href="<?php echo $_smarty_tpl->tpl_vars['result']->value['url_download_sd'];?>
"> Descargar </a>
					</div>
				</div><!-- post -->
            <?php } ?>   				              
        </div><!-- content -->
        <?php if ($_smarty_tpl->tpl_vars['before']->value>1){?> <a href="/search/?=<?php echo $_smarty_tpl->tpl_vars['programa']->value;?>
&pag=<?php echo $_smarty_tpl->tpl_vars['before']->value;?>
"> Retroceder </a> <br/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['bool']->value){?><a href="/search/?=<?php echo $_smarty_tpl->tpl_vars['programa']->value;?>
&pag=<?php echo $_smarty_tpl->tpl_vars['after']->value;?>
"> Avanzar </a> <br/> <?php }?>
        <div class="clearing"> </div>
        <div id="footer">
            <p>Copyright © 2012, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a><span> | </span><a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
        </div>
    </div><!-- page -->
</body></html>
<?php }} ?>