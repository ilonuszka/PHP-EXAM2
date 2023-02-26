<!doctype html>
<html>
<head>
    <title>Deklaruoti Skaitiklio duomenis</title>
    <style>
        div {
            margin: 0px 0px 0px 0px;
            line-height: 20px;}
        body{
            display:flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(223,251,255,1) 81%, rgba(190,237,246,1) 95%);
            overflow: hidden;}
        form{padding: 50px 20px 20px 20px;}
        .dataSet{
            display:grid; 
            grid-template-columns: 50px 90px 90px 90px;
            grid-template-rows: 2fr 0.5fr 2fr 2fr 2fr 0.5fr 2fr;
            grid-column-gap: 20px;
            grid-row-gap: 10px;}
        .monthPicker{
            display: flex;
            justify-content:space-between;
            grid-column-start: 1;
            grid-column-end: 5;}
        #month{width:140px;}
        .submit{display: flex;
            justify-content:center;
            grid-column-start: 1;
            grid-column-end: 5;}
        input {
            width: 86px;
            margin: 0;
            padding: 0;}
        #submit{
            width:120px;
            height:20px}
        .container{background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 9px 2px rgba(0,0,0,0.32);
            position: relative;}
        .title{position:absolute;
            width:100%;
            height:30px;
            background-color: darkblue; 
            top: 0px; 
            left: 0px;
            border-radius: 8px 8px 0 0;
            color: white;
            line-height: 30px;
            font-weight: 900;
            text-align: center;}
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="\submit">
            <span class="dataSet">
                <div class="monthPicker">
                    <label for="month">Mėnesis už kurį mokama:</label>
                    <input type="month" id="month" name="month" value="<?php echo date_create()->format("Y-m")?>">
                </div>
                <div></div><div></div><div></div><div></div>
                <div>Skalė</div><div>Rodmuo nuo</div><div>Rodmuo iki</div><div>Tarifas</div>
                <div>Dieninė</div>
                <div>
                    <input type="text" id="kwHoursDayFrom" name="kwHoursDayFrom" value="<?php echo $latestDeclarations->getKwHoursDay()?>"><br>
                </div>
                <div>
                    <input type="text" id="kwHoursDayTo" name="kwHoursDayTo"><br>
                </div>
                <div>
                    <input type="text" id="tariffDay" name="tariffDay"><br>
                </div>
                <div>Naktinė</div>
                <div>
                    <input type="text" id="kwHoursNightFrom" name="kwHoursNightFrom" value="<?php echo $latestDeclarations->getKwHoursNight()?>"><br>
                </div>
                <div>
                    <input type="text" id="kwHoursNightTo" name="kwHoursNightTo"><br>
                </div>
                <div>
                    <input type="text" id="tariffNight" name="tariffNight"><br>
                </div>
                <div></div><div></div><div></div><div></div>
                <div class="submit">
                    <input id="submit" type="submit" value="Skaičiuoti kainą"><br>
                </div>
            </span>
        </form>
        <div class="title">Įveskite skaitiklio rodmenis</div>
    </div>
</body>
</html>