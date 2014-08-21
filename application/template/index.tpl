<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
{* SMARTY *}
					<!-- API call a getHotSoftware -->
					{foreach from=$programs item=program}
						<li><a href="/program/{$program['program']['id_program']}/{$program['program']['title']|replace:' ':'-'}">{$program['program']['title']}</a></li>
					{/foreach}
					<!-- fi -->
                </ul>
            </div>
		</div><!-- sidebar --><!-- sidebar2 -->        

<!-- Posts o resultats, en definitiva el contingut -->		
        <div id="content">  
{* SMARTY *}
			{foreach from=$homeChoice item=home}
				{if $home['choice']['object_type'] == 'file'}
					<div class="post">
						<h2>{$home['choice']['title']}</h2>
						<p class="postmeta">{$home['choice']['date']}</p>
						<div class="entry">
								<p>{$home['choice']['long_desc']}</p>
						</div>
					</div><!-- post -->
				{/if}
            {/foreach}   				              
        </div><!-- content -->
        <div class="clearing"> </div>
        <div id="footer">
            <p>Copyright © 2012, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a><span> | </span><a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
        </div>
    </div><!-- page -->
</body></html>
