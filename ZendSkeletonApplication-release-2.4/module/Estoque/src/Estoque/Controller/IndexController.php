<?php

namespace Estoque\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Created by PhpStorm.
 * User: rothink
 * Date: 18/05/17
 * Time: 01:46
 */

class IndexController extends AbstractActionController {

    public function IndexAction()
    {
        $produtos = [];

        $produtos[] = [
            'nome' => "play",
            'preco' => 2700,
            'descricao' => 'Vídeo game legal'
        ];
        $produtos[] = [
            'nome' => "Xbox",
            'preco' => 2200,
            'descricao' => 'Vídeo rapaaaa'
        ];
        $produtos[] = [
            'nome' => "Óculos de sol",
            'preco' => 150,
            'descricao' => 'Pra pegar uma praiana'
        ];

        $view_params = array(
            'produtos' => $produtos
        );

        return new ViewModel($view_params);
    }

}