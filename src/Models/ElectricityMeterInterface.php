<?php

declare(strict_types=1);

namespace App\Models;

Interface ElectricityMeterInterface {
    public function getKwHoursDay (): int;
    public function getTariffDay (): float;
    public function getKwHoursNight (): int;
    public function getTariffNight (): float;
}