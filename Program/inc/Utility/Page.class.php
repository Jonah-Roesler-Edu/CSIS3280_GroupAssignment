<?php 
Class Page {
    static public $title = "Please, set the title!";
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

    static function formRestaurant(){?>
        <div class="conteniner">
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row">
                <div class="twelve columns">
                    <label for="name">Restaurant Name</label>
                    <input class="form-control" type="text" placeholder="Restaurant name" id="name" name="name" value="">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="timeOpen">Time Open</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeOpen" name="timeOpen" value="">
                </div>
                <div class="six columns">
                    <label for="timeClose">Time Close</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeClose" name="timeClose" value="">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="dayOpen">Day Open</label>
                    <select class="form-control" name="dayOpen" id="dayOpen"><?php
                        foreach (self::$week as $day) {
                            echo $day;
                            echo "<option value='".$day."'>".$day."</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="six columns">
                    <label for="dayClose">Day Close</label>
                    <select class="form-control" name="dayClose" id="dayClose"><?php
                        foreach (self::$week as $day) {
                            echo "<option value='".$day."'>".$day."</option>";
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

    static function formReservations($data){?>
        <div class="conteniner">
        <form method="POST" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="row">
                <div class="twelve columns">
                    <label for="name">Restaurant</label>
                    <?php
                        
                    ?>
                    <input class="form-control" type="text" placeholder="Restaurant name" id="name" name="name" value="">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="timeOpen">Time Open</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeOpen" name="timeOpen" value="">
                </div>
                <div class="six columns">
                    <label for="timeClose">Time Close</label>
                    <input class="form-control" type="time" placeholder="<?php echo time();?>" id="timeClose" name="timeClose" value="">
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <label for="dayOpen">Day Open</label>
                    <select class="form-control" name="dayOpen" id="dayOpen"><?php
                        foreach (self::$week as $day) {
                            echo $day;
                            echo "<option value='".$day."'>".$day."</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="six columns">
                    <label for="dayClose">Day Close</label>
                    <select class="form-control" name="dayClose" id="dayClose"><?php
                        foreach (self::$week as $day) {
                            echo "<option value='".$day."'>".$day."</option>";
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