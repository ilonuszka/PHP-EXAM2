<?php

declare(strict_types=1);

namespace App\Models;

class ElectricityMeterDualZone implements ElectricityMeterInterface
{
    public function __construct(
        private int $kwHoursDay,
        private float $tariffDay,
        private int $kwHoursNight,
        private float $tariffNight
    ){}

    public function getKwHoursDay (): int {
        return $this->kwHoursDay;
    }

    public function getTariffDay (): float {
        return $this->tariffDay;
    }

    public function getKwHoursNight (): int {
        return $this->kwHoursNight;
    }

    public function getTariffNight (): float {
        return $this->tariffNight;
    }
}