<?php

namespace Jaybizzle;

class Seasons
{
    /**
     * Seasons.
     * 
     * @var array
     */
    public $seasons = array(
        'Winter',
        'Spring',
        'Summer',
        'Autumn',
    );

    /**
     * Month/Season map.
     * 
     * @var array
     */
    public $monthRange = array(
        0 => array(12, 1, 2),
        1 => array(3, 4, 5),
        2 => array(6, 7, 8),
        3 => array(9, 10, 11),
    );

    /**
     * Parse input date and return numeric month.
     * 
     * @param  string
     *
     * @return int
     */
    public function getMonth($date)
    {
        if (is_null($date)) {
            return date('n');
        } else {
            if ($parsed_date = strtotime($date)) {
                return date('n', strtotime($date));
            }

            throw new \Exception('Input date must be parsable by strtotime().');
        }
    }

    /**
     * Parse date, return season.
     * 
     * @param  string
     *
     * @return string
     */
    public function get($date = null)
    {
        return $this->seasons[(int) (($this->getMonth($date) % 12) / 3)];
    }

    /**
     * Get months numbers that belong to the season.
     * 
     * @param string $season
     *
     * @return array
     */
    public function monthRange($season)
    {
        if (!in_array($season, $this->seasons)) {
            throw new \Exception($season.' is not a season.');
        }

        return $this->monthRange[array_search($seasons, $this->seasons)];
    }
}
