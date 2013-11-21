<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Php test</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
                      <!-- Form -->
          
         <h1> Skriv in nummret för varje del</h1>
         <form method="get" action="">
            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="partOne" placeholder="Del 1"><br>
            <input type="text" name="partTwo" placeholder="Del 2"><br>
            <input type="text" name="partThree" placeholder="Del 3"><br>
            <input type="text" name="partFour" placeholder="Del 4">

             <input type="submit">
         </form>
      
      <?php
          $totalClass = array();                    // Create an array for the whole class which I will save in my Database
          $pointsPartOne = $_GET['partOne'];        // Get value from one for every part of the test
          $pointsPartTwo = $_GET['partTwo'];
          $pointsPartThree = $_GET['partThree'];
          $pointsPartFour = $_GET['partFour'];
          $name = $_GET['name'];


          pointsFunc($pointsPartOne,$pointsPartTwo, $pointsPartThree, $pointsPartFour);  // run pointsFunc with all number parts as arguments
          nameStu($name);                                                                 // run nameFunc and pass in the name


          function nameStu($name){
            echo $name;                           //echo out the name
          }

          function pointsFunc($partOne, $partTwo, $partThree, $partFour){                 // define fuction and take  4 arguments 
            global $totalClass;                                                     //access global array
            $sum = $partOne + $partTwo + $partThree + $partFour;                  // save total sum for each student in variable
            echo $sum . "<br>";                                                   // echo out total sum
            if ($sum >= 19) {                                                     // if total sum is over 19 
              echo "Grattis du har fått VG <br>";                                   // echo that student get VG
            }elseif ($sum >=13) {                                                 //elseif student over 13 (but under 19) 
              echo "Grattis du har fått G <br>";                                  // echo that student get G
            }else{
              echo "Jag är ledsen, du har inte uppnått G <br>";                   // else / if under 13 echo student get IG
            }
            array_push($totalClass, $sum);                                        // push this students score to the global array 
            total();                                        // run total function

          }
         
           function total(){
             global $totalClass;                                            // access global array
              echo "Det minsta värdet i klassen var " . min($totalClass);     // echo out the samllest number in the variable
              echo "Det minsta värdet i klassen var " .max($totalClass);      // echo out the biggest number in the variable
              if (count($totalClass) > 3) {                                    // if out array has more than 3 values 
                echo calculate_median($totalClass);                             // run function calculate_median and pass in the global variable as argument
                echo calculate_average($totalClass);                             // run function calculate_average and pass in the global variable as argument
              }
           }

           function calculate_median($arr) {
              sort($arr);            // sort the array
              $count = count($arr); //save total numbers of array in variable
              $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
              if($count % 2) { // odd number, middle is the median
                  $median = $arr[$middleval];
              } else { // even number, calculate avg of 2 medians
                  $low = $arr[$middleval];
                  $high = $arr[$middleval+1];
                  $median = (($low+$high)/2);
              }
              return $median;
            }


          function calculate_average($arr) {
              $count = count($arr); //total numbers in array
              foreach ($arr as $value) {
                  $total = $total + $value; // total value of array numbers
              }
              $average = ($total/$count); // get average value
              return $average;
          }
            
      ?>

    </body>
</html>