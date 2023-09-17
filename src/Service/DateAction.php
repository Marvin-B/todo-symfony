<?php

namespace App\Service;

class DateAction
{
    private $day;
    private $month;
    private $year;

    private $hour;
    private $minute;
    private $second;

    public function __construct()
    {
        $this->day = date('d');
        $this->month = date('m');
        $this->year = date('Y');

        $this->hour = date('H');
        $this->minute = date('i');
        $this->second = date('s');

        

        switch ($this->month){
            case 1:
                $this->month = 'Janvier';
                break;
            case 2:
                $this->month = 'Février';
                break;
            case 3:
                $this->month = 'Mars';
                break;
            case 4:
                $this->month = 'Avril';
                break;
            case 5:
                $this->month = 'Mai';
                break;
            case 6:
                $this->month = 'Juin';
                break;
            case 7:
                $this->month = 'Juillet';
                break;
            case 8:
                $this->month = 'Août';
                break;
            case 9:
                $this->month = 'Septembre';
                break;
            case 10:
                $this->month = 'Octobre';
                break;
            case 11:
                $this->month = 'Novembre';
                break;
            case 12:
                $this->month = 'Décembre';
                break;
            default:
                $this->month = 'Unknown';
                break;
        }
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getHour(): int
    {
        return $this->hour;
    }

    public function getMinute(): int
    {
        return $this->minute;
    }

    public function getSecond(): int
    {
        return $this->second;
    }

    public function getFullDate(): string
    {
        return $this->day . ' ' . $this->month . ' ' . $this->year;
    }

    public function getFullTime(): string
    {
        return $this->hour . ':' . $this->minute . ':' . $this->second;
    }

    public function getFullDateTime(): string
    {
        return $this->getFullDate() . ' ' . $this->getFullTime();
    }
}
