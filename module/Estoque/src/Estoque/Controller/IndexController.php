<?php

namespace Estoque\Controller;

use Estoque\Entity\Produto;
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
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repository = $entityManager->getRepository('Estoque\Entity\Produto');
        $produtos = $repository->findAll();

        $view_params = array(
            'produtos' => $produtos
        );

        return new ViewModel($view_params);
    }

    public function cadastrarAction()
    {
        if($this->request->isPost()) {
            $nome = $this->request->getPost('nome');
            $preco = $this->request->getPost('preco');
            $descricao = $this->request->getPost('descricao');
            $produto = new Produto($nome, $preco, $descricao);

            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $entityManager->persist($produto);
            $entityManager->flush();

            $this->redirect()->toUrl('Index/index');
        }

        return new ViewModel();
    }

    public function removerAction()
    {
        $id = $this->params()->fromRoute('id');
        if($this->request->isPost()) {

            $id = $this->request->getPost('id');
            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $repository = $entityManager->getRepository('Estoque\Entity\Produto');
            $produto = $repository->find($id);
            $entityManager->remove($produto);
            $entityManager->flush();
            $this->redirect()->toUrl('/Index/index');
        }

        return new ViewModel(['id' => $id]);
    }

    public function editarAction()
    {
        $id = $this->params()->fromRoute('id');

        if(is_null($id)) {
            $id = $this->request->getPost('id');
        }

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repository = $entityManager->getRepository('Estoque\Entity\Produto');
        $produto = $repository->find($id);

        if($this->request->isPost()) {

            $produto->setNome($this->request->getPost('nome'));
            $produto->setPreco($this->request->getPost('preco'));
            $produto->setDescricao($this->request->getPost('descricao'));
            $entityManager->persist($produto);
            $entityManager->flush();

            $this->flashMessenger()->addMessage('Produto alterado com sucesso');

            $this->redirect()->toUrl('/Index/index');
        }

        return new ViewModel(['produto' => $produto]);
    }

}