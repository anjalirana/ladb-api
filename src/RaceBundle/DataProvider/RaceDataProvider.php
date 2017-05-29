<?php

namespace RaceBundle\DataProvider;

class RaceDataProvider
{
    private $races;

    private $players;

    private $types;

    public function __construct()
    {
        $this->races = [
            [
                'type' => 'Thoroughbred',
                'code' => 'A1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/29 09:26:30'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'A2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 09:13:30'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'B1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 12:30:00'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'B2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 13:30:00'
            ],
            [
                'type' => 'Greyhounds',
                'code' => 'C1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 14:30:00'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'C2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 15:30:00'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'D1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 16:30:00'
            ],
            [
                'type' => 'Greyhounds',
                'code' => 'D2',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 17:30:00'
            ],
            [
                'type' => 'Thoroughbred',
                'code' => 'E1',
                'meeting' => 'Belmont',
                'closingDateTime' => '2017/05/30 18:30:00'
            ]
        ];
        $this->players = [
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Smith',
                'position' => '2',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Jones',
                'position' => '3',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Karl',
                'position' => '4',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Kaiden',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Krish',
                'position' => '1',
                'raceCode' => 'B1'
            ],
            [
                'name' => 'Trev',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Smith',
                'position' => '2',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Jones',
                'position' => '3',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Karl',
                'position' => '4',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Kaiden',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Krish',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Trev',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Smith',
                'position' => '2',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Jones',
                'position' => '3',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Karl',
                'position' => '4',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Kaiden',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Krish',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Trev',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'James',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Smith',
                'position' => '2',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Jones',
                'position' => '3',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Karl',
                'position' => '4',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Kaiden',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Krish',
                'position' => '1',
                'raceCode' => 'A1'
            ],
            [
                'name' => 'Trev',
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
        $activeRaces = [];
        foreach ($races as $race) {
            if ($this->isRaceActive($race)) {
                array_push($activeRaces, $race);
            }
        }

        if (count($activeRaces) > 0) {
            $races = $activeRaces;
        }

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
            if ($race['code'] === $raceCode &&
                $this->isRaceActive($race)
            ) {
                return $race;
            }
        }

        return null;
    }

    public function isRaceActive($race)
    {
        $dateTimeNow = new \DateTime();
        $dateTimeNow = $dateTimeNow->format("Y/m/d hh:mm:ss");

        $raceDateTime = new \DateTime($race['closingDateTime']);
        $raceDateTime = $raceDateTime->format("Y/m/d hh:mm:ss");

        if ($raceDateTime > $dateTimeNow) {
            return true;
        }

        return false;
    }
}