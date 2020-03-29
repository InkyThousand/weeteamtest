<?php
namespace App\Controller;

use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="index", options={ "method_prefix" = false })
     */
    public function indexAction()
    {
        return $this->render(
            'index.html.twig',
            [
                'users' => [
                    0 => [
                        'id' => '1',
                        'name' => 'Nik',
                        'dossierNumber' => '2121'
                    ],
                    1 => [
                        'id' => '2',
                        'name' => 'Dan',
                        'dossierNumber' => '444'
                    ]
                ]
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="edit_user", options={ "method_prefix" = false })
     * @param $id
     */
    public function editAction($id)
    {

        return $this->render(
            'crud.html.twig',
            [
                'id' => '1',
                'name' => 'Nik',
                'dossierNumber' => '2121'
            ]
        );
//        return [];

    }
    /**
     * @Route("/add", name="add_users", options={ "method_prefix" = false })
     * @param Request $request
     * @return RedirectResponse
     */
    public function addAction(Request $request)
    {
        return new RedirectResponse($this->redirectToRoute('index'));
    }
}