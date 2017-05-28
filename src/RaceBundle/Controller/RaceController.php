<?php

namespace RaceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use RaceBundle\DataProvider\RaceDataProvider;

class RaceController extends FOSRestController
{
    /**
     * @Route("/", name="homepage")
     */
    public function typesAction(Request $request)
    {
        $dataProvider = new RaceDataProvider();
        $view = new View();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $view->setHeaders($headers);
        $view->setData($dataProvider->getTypes());
        $view->setStatusCode(200);

        return $this->getViewHandler()->handle($view);

    }

    public function listAction(Request $request)
    {
        $type = $request->get('type');
        $dataProvider = new RaceDataProvider();
        $view = new View();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $view->setHeaders($headers);
        $view->setData($dataProvider->getNextFiveRaces($type));
        $view->setStatusCode(200);

        return $this->getViewHandler()->handle($view);
    }

    public function raceDetailAction(Request $request)
    {
        $code = $request->get('code');
        $dataProvider = new RaceDataProvider();
        $view = new View();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $view->setHeaders($headers);
        $view->setData([
            'raceData' => $dataProvider->getRaceData($code),
            'players' => $dataProvider->getRacePlayers($code)
        ]);
        $view->setStatusCode(200);

        return $this->getViewHandler()->handle($view);
    }



}
