<?php

class ProgramController extends AbstractController {
    
    public function run(){
        
        $model = new ProgramModel();
        $url = $this->request->getUrl();
        $params = explode('/', $url);
        $model->setId($params[2]);
        $model->run();
        $data = $model->getData();
        
        if($data['status'] != 'ok'){
            throw new Exception('L\'identificador no és correcte');
        }
        elseif(false === strpos($params[3], str_replace(' ', '-', $data['program']['title']))){
            throw new Exception('El programa i identificador no coincideixen');
        }
        else{
            
            $this->view->assign('programa', $data['program'] );
            $this->view->display( 'program.tpl' );
        }
    }
}

?>
