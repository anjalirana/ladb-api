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
    public function typesAction()
    {
        $dataProvider = new RaceDataProvider();

        $view = $this->getView();
        $types = $dataProvider->getTypes();
        if (!empty($types)) {
            $view->setData($types);
            $view->setStatusCode(200);
        } else {
            $view->setStatusCode(404);
        }

        return $this->getViewHandler()->handle($view);

    }

    public function listAction(Request $request)
    {
        $type = $request->get('type');
        $dataProvider = new RaceDataProvider();

        $view = $this->getView();
        $nextFiveRaces = $dataProvider->getNextFiveRaces($type);

        if (!empty($nextFiveRaces)) {
            $view->setData($nextFiveRaces);
            $view->setStatusCode(200);
        } else {
            $view->setStatusCode(404);
        }

        return $this->getViewHandler()->handle($view);
    }

    public function raceDetailAction(Request $request)
    {
        $code = $request->get('code');
        $dataProvider = new RaceDataProvider();

        $raceData = $dataProvider->getRaceData($code);
        $view = $this->getView();

        if (!empty($raceData)) {
            $racePlayers = $dataProvider->getRacePlayers($code);
            $view->setData([
                'raceData' => $raceData,
                'players' => $racePlayers
            ]);
            $view->setStatusCode(200);
        } else {
            $view->setStatusCode(404);
        }

        return $this->getViewHandler()->handle($view);
    }

    protected function getView()
    {
        $view = new View();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $view->setHeaders($headers);

        return $view;
    }
}
