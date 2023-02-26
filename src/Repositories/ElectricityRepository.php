<?php

declare(strict_types=1);

namespace App\Repositories;

use \App\Models\ElectricityMeterDualZone;

class ElectricityRepository {
    private array $electricityUsageData = [];

    public function __construct(
        private \App\Services\JsonService $jsonService,
        private \App\Services\FileService $fileService)
    {
        $this->electricityUsageData = $this->getAll();
    }

    public function getAll(): array{
        $fileContent = $this->fileService->read();
        $declarationArray = $this->jsonService->JsonDecode($fileContent);
        return $declarationArray;
    }

    public function getLastDeclaration(): ElectricityMeterDualZone {
        $latestYear = $this->findLatest($this->electricityUsageData);
        $latestMonth = $this->findLatest($this->electricityUsageData[$latestYear]);
        return new ElectricityMeterDualZone(
            $this->electricityUsageData[$latestYear][$latestMonth]['day']['counter'],
            $this->electricityUsageData[$latestYear][$latestMonth]['day']['tariff'],
            $this->electricityUsageData[$latestYear][$latestMonth]['night']['counter'],
            $this->electricityUsageData[$latestYear][$latestMonth]['night']['tariff']
        );
    }

    public function storeDeclaredData(string $declaredMonth, ElectricityMeterDualZone $declaredData){
        $year = explode('-',$declaredMonth)[0];
        $month = explode('-',$declaredMonth)[1];
        $this->electricityUsageData[$year][$month]['day'] = [
            "counter" => $declaredData->getKwHoursDay(), 
            "tariff" => $declaredData->getTariffDay()
        ];
        $this->electricityUsageData[$year][$month]['night'] = [
            "counter" => $declaredData->getKwHoursNight(), 
            "tariff" => $declaredData->getTariffNight()
        ];
        $json = $this->jsonService->JsonEncode( $this->electricityUsageData);
        $this->fileService->write($json);
    }

    private function findLatest(array $declarationArray):string{
        $latestYear='0';
        foreach ($declarationArray as $key => $value) {
            if (intval($key)>intval($latestYear)) $latestYear = $key;
        }
        return (string)$latestYear;
    }
}