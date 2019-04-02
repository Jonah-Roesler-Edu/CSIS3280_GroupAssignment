<?php 
Class Page {
    static public $title = "Please, set the title!";
    static public $subtitle = "";
    static public $week = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    static function header() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>

        <!-- Basic Page Needs
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title><?php echo self::$title; ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Mobile Specific Metas
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FONT
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

        <!-- CSS
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">

        <!-- Favicon
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="images/favicon.png">

        </head>
        <body>

        <!-- Primary Page Layout
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <div class="container">
            <div class="row">
            <div class="twelve columns" style="margin-top: 5%">
            <div class="seven columns"><h2><?php echo self::$title; ?></h2></div><div class="five columns"><a href="#">For Restaurants</a> <input type="button" value="Sign in"> <input type="button" value="Sign up"></div>
            </div>

<?php

    }

    static function dashboard($data){
        echo "<div class='conteniner'>";
        $a=0;
        while ($a <= $data) {
            $rest = $data-$a;
            if ($rest>=3) {
                echo "<div class='row'>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+1)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+2)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+3)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "</div>";
            } 
            if ($rest==2) {
                echo "<div class='row'>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+1)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+2)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "<div class='four columns'></div>";
                echo "</div>";
            }elseif ($rest==1) {
                echo "<div class='row'>";
                echo "<div class='four columns'>";
                echo "<img src='Imagens/kitchen.jpg' alt='img'>";
                echo "<h4>Restaurant ".($a+1)."</h4>";
                echo "<h6>Books today</h6>";
                echo "<a href='#' style='float: right;'>Book a table</a></div>";
                echo "<div class='four columns'></div>";
                echo "<div class='four columns'></div>";
                echo "</div>";
            }
            $a+=3;
        }
        echo "</div>";
    }

    static function formRestaurant(Restaurant $data = null){?>
        <div class="conteniner">
        <h4><?php echo self::$subtitle; ?></h4>
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row">
                <div class="twelve columns">
                    <label for="name">Restaurant Name</label>
                    <input class="form-control" type="text" placeholder="Restaurant name" id="name" name="name" value="<?php if($data!=null){echo $data->getName();}?>">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="timeOpen">Time Open</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeOpen" name="timeOpen" value="<?php if($data!=null){ echo date("h:i", $data->getTimeOpen());}?>">
                </div>
                <div class="six columns">
                    <label for="timeClose">Time Close</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeClose" name="timeClose" value="<?php if($data!=null){echo date("h:i", $data->getTimeClose());}?>">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="dayOpen">Day Open</label>
                    <select class="form-control" name="dayOpen" id="dayOpen"><?php
                        foreach (self::$week as $day) {
                            echo $day;
                            if ( !isset($data)){
                                echo "<option value='".$day."'>".$day."</option>";
                            } elseif ($data->getDayOpen()==$day) {
                                echo "<option value='".$day."' selected>".$day."</option>";
                            } else {
                                echo "<option value='".$day."'>".$day."</option>";
                            }
                            
                        }
                    ?>
                    </select>
                </div>
                <div class="six columns">
                    <label for="dayClose">Day Close</label>
                    <select class="form-control" name="dayClose" id="dayClose"><?php
                        foreach (self::$week as $day) {
                            if ( !isset($data)){
                                echo "<option value='".$day."'>".$day."</option>";
                            } elseif ($data->getDayClose()==$day) {
                                echo "<option value='".$day."' selected>".$day."</option>";
                            } else {
                                echo "<option value='".$day."'>".$day."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </form>
        </div>
    <?php
    }

    static function formReservations(Reservation $reservation = null, Customer $customer=null){?>
        <div class="conteniner">
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h4><?php echo self::$subtitle; ?></h4>
            <div class="row">
                <div class="twelve columns">
                    <label for="numPeople">Table Size</label>
                    <input class="form-control" type="number" placeholder="Table size" id="numPeople" name="numPeople" value="<?php if($reservation!=null){echo $reservation->getNumPeople();}?>">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="date">Date</label>
                    <input class="form-control" type="date" placeholder="<?php echo date("Y-m-d");?>" id="date" name="date" value="<?php if($reservation!=null){echo $reservation->getDate();}?>">
                </div>
                <div class="six columns">
                    <label for="time">Time</label>
                    <input class="form-control" type="time" placeholder="<?php echo date("h:i");?>" id="time" name="time" value="<?php if($reservation!=null){echo date("h:i", $reservation->getTime());}?>">
                </div>
            </div>
            <h4>Customer Info</h4>
            <div class="row">
                <div class="six columns">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" placeholder="Customer name" id="name" name="name" value="<?php if($customer!=null){echo $customer->getName();}?>">
                    </select>
                </div>
                <div class="six columns">
                    <label for="lastname">Lastname</label>
                    <input class="form-control" type="text" placeholder="Customer lastname" id="lastname" name="lastname" value="<?php if($customer!=null){echo $customer->getLastName();}?>">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" placeholder="Customer email" id="email" name="email" value="<?php if($customer!=null){echo $customer->getEmail();}?>">
                    </select>
                </div>
                <div class="six columns">
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </form>
        </div>
    <?php
    }

    static function showReservations($data){
        echo "<div class='conteniner'>";
        echo "<h4>Reservations for today</h4>";
        $a=0;
        foreach ($data as $reservations) {
            $rest = count($data)-$a;
            if ($rest>=3) {
                echo "<div class='row'>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                echo "</div>";
            } 
            if ($rest==2) {
                echo "<div class='row'>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                    echo "<div class='four columns'></div>";
                echo "</div>";
            }elseif ($rest==1) {
                echo "<div class='row'>";
                    echo "<div class='four columns'>";
                    echo "<h5>".date("h:i a", $reservations->getTime())."</h5></div>";
                    echo "<div class='four columns'></div>";
                    echo "<div class='four columns'></div>";
                echo "</div>";
            }
            $a+=3;
        }   
        echo "</div>";   
    }

    static function footer() {
        ?>
        </div>
        </div>
    </div>

    <!-- End Document
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
    </html>


        <?php
    }
}

?>