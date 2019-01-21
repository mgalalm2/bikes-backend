<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Service\PluralNamingStrategy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var File
     */
    private $file;
    /**
     * @var PluralNamingStrategyc
     */
    private $pluralNamingStrategy;

    public function __construct(EntityManagerInterface $em, PluralNamingStrategy $pluralNamingStrategy)
    {
        $this->em = $em;
        $this->pluralNamingStrategy = $pluralNamingStrategy;
        dump(class_implements($this->pluralNamingStrategy));
    }

    /**
     * @Route("/api/{slug}", methods={"GET"}, name="api")
     */
    public function index($slug, Request $request)
    {
        $repository = $this->em->getRepository(Bike::class);
        dump(class_implements($this->em));
        $bikes = $repository->findAll();
        return $this->json($bikes);

//        \return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/ApiController.php',
//        ]);
    }

    /**
     * @Route("/api/{slug}", methods={"POST"}, name="post_test")
     */
    public function postTest($slug, Request $request) {
        $attrbuites = $request->attributes;

        return new JsonResponse('test');
    }
}
