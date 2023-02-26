<!doctype html>
<html>
<head>
    <title>Įsitikinkite, kad pateikti duomenys teisingi</title>
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
            grid-template-columns: 50px 50px 50px 50px 50px 50px;
            grid-template-rows: 2fr 0.5fr 2fr 2fr 2fr 2fr 0.5fr 2fr;
            grid-column-gap: 20px;
            grid-row-gap: 10px;}
        .monthPicker{
            display: flex;
            justify-content:space-between;
            grid-column-start: 1;
            grid-column-end: 7;}
        #month{width:140px;}
        .submit{display: flex;
            justify-content:center;
            grid-column-start: 1;
            grid-column-end: 7;}
        input {
            width: 86px;
            margin: 0;
            padding: 0;}
        #submit{
            width:160px;
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
        <form method="POST" action="\pay">
            <span class="dataSet">
                <div class="monthPicker">
                    Mėnesis už kurį mokama:&nbsp<?php echo $_POST['month']?><input type="hidden" id="month" name="month" value="<?php echo $_POST['month']?>">
                </div>
                <div></div><div></div><div></div><div></div><div></div><div></div>
                <div>Skalė</div><div>Nuo</div><div>Iki</div><div>Skirtumas</div><div>Tarifas</div><div>Suma</div>
                <div>Dieninė</div>
                <div>
                    <?php echo $_POST['kwHoursDayFrom']?><input type="hidden" id="kwHoursDayFrom" name="kwHoursDayFrom" value="<?php echo $_POST['kwHoursDayFrom']?>">
                </div>
                <div>
                    <?php echo $_POST['kwHoursDayTo']?><input type="hidden" id="kwHoursDayTo" name="kwHoursDayTo" value="<?php echo $_POST['kwHoursDayTo']?>">
                </div>
                <div>
                    <?php echo $diffDay?><input type="hidden" id="diffDay" name="diffDay" value="<?php echo $diffDay?>">
                </div>
                <div>
                    <?php echo $_POST['tariffDay']?><input type="hidden" id="tariffDay" name="tariffDay" value="<?php echo $_POST['tariffDay']?>">
                </div>
                <div>
                    <?php echo $priceDay?><input type="hidden" id="priceDay" name="priceDay" value="<?php echo $priceDay?>">
                </div>
                <div>Naktinė</div>
                <div>
                    <?php echo $_POST['kwHoursNightFrom']?><input type="hidden" id="kwHoursNightFrom" name="kwHoursNightFrom" value="<?php echo $_POST['kwHoursNightFrom']?>">
                </div>
                <div>
                    <?php echo $_POST['kwHoursNightTo']?><input type="hidden" id="kwHoursNightTo" name="kwHoursNightTo" value="<?php echo $_POST['kwHoursNightTo']?>">
                </div>
                <div>
                    <?php echo $diffNight?><input type="hidden" id="diffNight" name="diffNight" value="<?php echo $diffNight?>">
                </div>
                <div>
                    <?php echo $_POST['tariffNight']?><input type="hidden" id="tariffNight" name="tariffNight" value="<?php echo $_POST['tariffNight']?>">
                </div>
                <div>
                    <?php echo $priceNight?><input type="hidden" id="priceNight" name="priceNight" value="<?php echo $priceNight?>">
                </div>
                <div>Viso:</div><div></div><div></div><div></div><div></div><div><?php echo $totalPrice?><input type="hidden" id="totalPrice" name="totalPrice" value="<?php echo $totalPrice?>"></div>
                <div></div><div></div><div></div><div></div><div></div><div></div>
                <div class="submit">
                    <input id="submit" type="submit" value="Deklaruoti ir apmokėti"><br>
                </div>
            </span>
        </form>
        <div class="title">Įsitikinkite, kad pateikti duomenys teisingi</div>
    </div>
</body>
</html>