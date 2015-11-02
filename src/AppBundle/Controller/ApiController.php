<?php

namespace AppBundle\Controller;


use AppBundle\Entity\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ApiController
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/series/{id}", name="api_series", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function seriesAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var SeriesRepository $repo */
        $repo= $em->getRepository('AppBundle:Series');

        $series= $repo->findApi($id);

        return new JsonResponse($series);
    }
}