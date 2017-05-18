<?php
/**
 * Created by PhpStorm.
 * User: rothink
 * Date: 18/05/17
 * Time: 03:03
 */

namespace Estoque\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Produto {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="decimal",scale=2)
     */
    private $preco;

    /**
     * @ORM\Column(type="string")
     */
    private $descricao;
}