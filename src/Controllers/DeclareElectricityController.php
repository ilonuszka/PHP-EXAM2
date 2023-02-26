<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\Models\ElectricityMeterDualZone;

class DeclareElectricityController {

    public function __construct(private \App\Repositories\ElectricityRepository $electricityRepository){}
    
    public function enterData(){
        $latestDeclarations = $this->electricityRepository->getLastDeclaration();
        require __DIR__.'//..//..//views//electricity//enterData.php';
    }
    
    public function calculate(){
        $currentDate=date_create();
        $chosenDateLate=date_create_from_format("Y-m-d",$_POST['month'].'-01')->modify("last day of this month +1 month");
        $chosenDateEarly=date_create_from_format("Y-m-d",$_POST['month'].'-01')->modify("last day of this month");
        $diffLate=date_diff($chosenDateLate,$currentDate)->format("%R%a");
        $diffEarly=date_diff($currentDate,$chosenDateEarly)->format("%R%a");
        if ($diffLate>0) throw new \App\Exceptions\IncorrectMonthException("Jūs vėluojate sumokėti mokesčius ".intval($diffLate)." d.");
        if ($diffEarly>0) throw new \App\Exceptions\IncorrectMonthException("Už pasirinktą mėnesį deklaruoti galėsite tik po ".intval($diffEarly)." d.");

        $diffDay = intval($_POST['kwHoursDayTo'])-intval($_POST['kwHoursDayFrom']);
        $diffNight = intval($_POST['kwHoursNightTo'])-intval($_POST['kwHoursNightFrom']);
        $priceDay = $diffDay*floatval($_POST['tariffDay']);
        $priceNight = $diffNight*floatval($_POST['tariffNight']);
        $totalPrice = $priceDay + $priceNight;
        require __DIR__.'//..//..//views//electricity//calculate.php';
    }

    public function pay(){
        $declaredData = new ElectricityMeterDualZone (
            intval($_POST['kwHoursDayTo']),
            floatval($_POST['tariffDay']),
            intval($_POST['kwHoursNightTo']),
            floatval($_POST['tariffNight'])
        );
        $this->electricityRepository->storeDeclaredData($_POST['month'], $declaredData);
        require __DIR__.'//..//..//views//electricity//pay.php';
    }
}