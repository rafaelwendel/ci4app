<?php namespace App\Controllers;

class Produtos extends BaseController {
    
    public function index()
    {
        
    }
    
    public function inserir()
    {
        $data['titulo'] = 'Inserir novo produto';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';
        if($this->request->getMethod() === 'post'){
            $produtoModel = new \App\Models\ProdutoModel();
            $dadosProduto = $this->request->getPost();
            $inserir = $produtoModel->insert($dadosProduto);
            
            if($inserir){
                $data['msg'] = 'Produto #'. $inserir .' inserido com sucesso';
            }
            else{
                $data['msg'] = 'Erro ao inserir produto';
                $data['erros'] = $produtoModel->errors();
            }
        }
        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        helper('form');
        $arrayCategorias = [];
        foreach ($listaCategorias as $categoria){
            $arrayCategorias[$categoria->id] = $categoria->nomecategoria;
        }
        $data['comboCategorias'] = form_dropdown('categoria_id', $arrayCategorias);
        echo view('produtos_form', $data);
    }
    
}

