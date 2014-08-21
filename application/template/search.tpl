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
			<b> Plataforma: </b> <br/>
                        {foreach from=$platforms item= platform}
                            {if $platform['platform']['name'] != 'Web Apps' and $platform['platform']['name'] != 'Palm OS' and $platform['platform']['name'] != 'Pocket PC'}
                                <a href="/search/?program={$programa}&pag={$actual}&platform={$platform['platform']['name']|lower}"> {$platform['platform']['name']} </a> <br/>
                            {/if}
                        {/foreach}   
                         {foreach from=$results item= result}
				<div class="post">
					<h2><a href="/program/{$result['id_program']}/{$result['name']|replace:' ':'-'}"> {$result['name']}</a></h2>
					<div class="entry">
						Plataforma: {$result['platform_name']} <br/>
						Licencia: {$result['license']} <br/>
						Rating: {$result['softonic_rating']} <br/>
						<p> Descripción: {$result['description']}</p>
						<a href="{$result['url_download_sd']}"> Descargar </a>
					</div>
				</div><!-- post -->
            {/foreach}   				              
        </div><!-- content -->
        {if $before > 1} <a href="/search/?={$programa}&pag={$before}"> Retroceder </a> <br/>{/if}
        {if $bool}<a href="/search/?={$programa}&pag={$after}"> Avanzar </a> <br/> {/if}
        <div class="clearing"> </div>
        <div id="footer">
            <p>Copyright © 2012, designed by <a href="http://www.webtemplateocean.com/">WebTemplateOcean.com</a><span> | </span><a href="#">Privacy Policy</a><!--%@##--> Design provided by <a href="http://www.freewebtemplates.com/">Free Website Templates</a>.<!--##@%--></p>
        </div>
    </div><!-- page -->
</body></html>
