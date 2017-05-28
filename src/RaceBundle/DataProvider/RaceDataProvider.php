<?php

namespace RaceBundle\DataProvider;

class RaceDataProvider
{
    private $races;

    private $meetings;

    private $players;

    private $types;

    public function __construct()
    {
        $dateTime = new \Symfony\Component\Validator\Constraints\Date();

        $this->races = [
            [
                'type' => 'Thoroughbred',
                'code' => 'A1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 10:30:00am'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'A2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 11:30:00am'
            ],
            [
                'type' => 'Harness',
                'code' => 'B1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 12:30:00pm'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'B2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 1:30:00pm'
            ],
            [
                'type' => 'Greyhounds',
                'code' => 'C1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 2:30:00pm'
            ],
            [
                'type' => 'Harness',
                'code' => 'C2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 3:30:00pm'
            ],
            [
                'type' => 'Harness',
                'code' => 'D1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 4:30:00pm'
            ],
            [
                'type' => 'Greyhounds',
                'code' => 'D2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 5:30:00pm'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'E1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017-05-28 6:30:00pm'
            ]
        ];
        $this->players = [
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '2',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ]
        ];
        $this->types = [
            'Thoroughbred',
            'Greyhounds',
            'Harness'
        ];
    }


    public function getNextFiveRaces($type = null)
    {
        $races = $this->races;

        if (count($races) > 5) {
            $races = array_slice($races, 0, 5);
        }

        if (!empty($type)) {
            $racesByType = [];
            foreach ($races as $race) {
                if ($race['type'] === $type) {
                    array_push($racesByType, $race);
                }
            }

            $races = $racesByType;
        }

        return $races;
    }

    public function getTypes()
    {
        return $this->types;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function getRacePlayers($raceCode = null)
    {
        $players = [];

        foreach ($this->getPlayers() as $player) {
            if ($player['raceCode'] === $raceCode) {
                array_push($players, $player);
            }
        }

        return $players;
    }

    public function getRaceData($raceCode)
    {
        $races = $this->getNextFiveRaces();

        foreach ($races as $race) {
            if ($race['code'] === $raceCode) {
                return $race;
            }
        }

        return null;
    }
}