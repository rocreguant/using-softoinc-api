<?php

class SearchController extends AbstractController {
    public function run(){
        $model = new SearchModel();
        if(!isset($_GET['pag']) || empty($_GET['pag'])) $_GET['pag'] =2;
        if(!isset($_GET['category']) || empty($_GET['category'])) $_GET['category'] =2;
        if(!isset($_GET['platform']) || empty($_GET['platform'])) $_GET['platform'] ='windows';
        if(!isset($_GET['program']) || empty($_GET['program']) ){
            throw new Exception('Els parametres no són correctes');
        }
        else{
            $model->run();
            
            $this->view->assign('results', $model->getData());
            
            $this->view->assign('programa', $_GET['program']);
            $this->view->assign('actual', $_GET['pag']);
            $this->view->assign('before', $_GET['pag']-1);
            $this->view->assign('after', $_GET['pag']+1);
            $this->view->assign('bool', $model->hiHaNext());
            
/*                                    {if $existeixCategory}
                            {foreach from=$categories item=category}
                                <a href="/search/?={$programa}&pag={$actual}&platform={$platform['name']}"> {$platform['name']} </a> <br/>
                            {/foreach}
                        {/if}
            $category = $model->getCategory();
            $this->view->assign('existeixCategory', $category['total_items']!=0);
            $this->view->assign('categories', $category['sections']);
 * 
 */
            $this->view->assign('platforms', $model->getPlataforms());            
            $this->view->display( 'search.tpl' );

        }
    }
}

?>
