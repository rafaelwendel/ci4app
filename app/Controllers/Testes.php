<?php namespace App\Controllers;

class Testes extends BaseController {
    
    public function index()
    {
        $senha = 'T9estes#';
        $validation =  \Config\Services::validation();
        
        $result = $validation->check($senha, 'required|min_length[6]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]|regex_match[/\W/]');
        var_dump($result);
        echo '<br />';
        print_r($validation->getErrors());
    }
    
    public function diretorio($pasta)
    {
        helper('filesystem');
        $path = FCPATH . 'img/' . $pasta;
        $map = directory_map($path);
        if(is_array($map) && count($map) > 0){
            foreach ($map as $imagem){
                \Config\Services::image()
                ->withFile($path . '/' . $imagem)
                ->text("")
                ->save($path . '/' . $imagem, 40);
                echo $imagem . ' - OK<br />';
            }
        }
    }
}