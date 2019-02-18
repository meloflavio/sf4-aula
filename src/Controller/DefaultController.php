<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 2019-02-18
 * Time: 10:11
 */

namespace App\Controller;


use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController ;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    const NOME =  'Curso Mobral';

    public function index(Request $request)
    {
        return $this->render('index.html');
    }

    public function aula1(Request $request)
    {
        $mensagem = 'Ola Mundo';
        $array= ['1','2','3'];

        return $this->render('aula1_twig.html.twig', [
            'message' => $mensagem,
            'array'=> $array
        ]);
    }

    public function blockExtends()
    {
        return $this->render('aula1_block.html.twig', [
        ]);
    }

}
