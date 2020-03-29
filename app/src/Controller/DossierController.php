<?php
namespace App\Controller;

use App\Entity\Dossier;
use App\Form\DossierType;
use App\Repository\DossierRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class DossierController extends AbstractController
{

    /**
     * @var DossierRepository
     */
    private $dossierRepository;
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(DossierRepository $dossierRepository, RouterInterface $router, FormFactoryInterface $formFactory, EntityManagerInterface $entityManager)
    {
        $this->dossierRepository = $dossierRepository;
        $this->router = $router;
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="index", options={ "method_prefix" = false })
     */
    public function indexAction()
    {
        return $this->render(
            'index.html.twig',
            [
                'users' => $this->dossierRepository->findBy(array('status' => true))
            ]
        );
    }

    /**
     * @Route("/edit/{id}", name="crud_dossier", options={ "method_prefix" = false })
     * @param $id
     * @param Request $request
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function crudAction($id = null, Request $request)
    {
        if(!empty($id)){
            $dossier = $this->dossierRepository->find($id);
        } else {
            $dossier = new Dossier();
        }

        $form = $this->createForm(DossierType::class, $dossier);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($dossier);
            $this->entityManager->flush();

            return new RedirectResponse($this->router->generate('index'));
        }

        return $this->render(
            'crud.html.twig',
            ['form' => $form->createView()]
        );

    }

    /**
     * @Route("/delete/{id}", name="delete_dossier", options={ "method_prefix" = false })
     * @param $id
     * @return RedirectResponse
     */
    public function deleteAction($id)
    {
        $dossier = $this->dossierRepository->find($id);
        $dossier->setStatus(false);

        $this->entityManager->persist($dossier);
        $this->entityManager->flush();

        return new RedirectResponse($this->router->generate('index'));
    }
}