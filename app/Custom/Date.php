<?php

namespace App\Custom;

class Date
{
    private $yyyy;
    private $mm;
    private $dd;
    

    function __construct(int $year, int $month, int $day)
    {
        $this->yyyy = $year;
        $this->mm = $month;
        $this->dd = $day;
    }

    public function n_days()
    {
        $days_by_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        $start_year = -5000;
        
        $n_years = $this->yyyy - $start_year;

        $n_days = 365 * $n_years + intdiv($n_years, 4);
        for ($i = 0; $i < $this->mm; ++$i)
        {
            $n_days += $days_by_month[$i];
        }
        $n_days += $this->dd;

        return $n_days;
    }

    private function date_from_n_days(int $n_days)
    {
        // Jours restants apres avoir gerer les annees par paquets de 4 ans
        $remainder = fmod($n_days, 365 * 4 + 1);

        // [Nombre d'annees (gerees par paquet de 4 ans)] + [Nombre d'annees dans le reste]
        $years = intdiv($n_days, 365 * 4 + 1) * 4         + intdiv($remainder, 365);

        // Jours restants = [Jours totaux] - [Jours annees non bissextiles] - [Annees bissextiles]
        $remainding_days = $n_days - 365 * $years - intdiv($years, 4);


        $days_by_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $months = 0;
        for ($months = 0; $months < 12, $remainding_days > 0; ++$months)
        {
            $remainding_days -= $days_by_month[$months];
        }
        if ($months > 0)
        {
            $remainding_days += $days_by_month[$months - 1];
        }

        return new Date($years, $months, $remainding_days);
    }

    public function diff(Date $other)
    {
        $days = $this->n_days() - $other->n_days();
        return $this->date_from_n_days($days);
    }

    public function to_string()
    {
        return str_pad($this->dd, 2, '0', STR_PAD_LEFT) . '/' . str_pad($this->mm, 2, '0', STR_PAD_LEFT) . '/' . str_pad($this->yyyy, 4, '0', STR_PAD_LEFT);
    }

    public function year()
    {
        return $this->yyyy;
    }

    public function month()
    {
        return $this->mm;
    }

    public function day()
    {
        return $this->dd;
    }

    public function age()
    {
        $diff_date = Date::today()->diff($this);
        return $diff_date->yyyy;
    }

    public static function parse(string $string)
    {
        $array = explode('/', $string);
        $dd = (int)$array[0];
        $mm = (int)$array[1];
        $yyyy = (int)$array[2];

        return new Date($yyyy, $mm, $dd);
    }

    public static function today()
    {
        return Date::parse("01/02/2021");
    }
}