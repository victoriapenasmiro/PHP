<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function factorialProfe($num) {

            if ($num === 1) {
                return 1;
            }
            
            return $num * factorialProfe($num - 1);
        }

        echo factorialProfe(229999999922222) . "<br>"; //output 6

        function factorial($num) {

            //pinto el cálculo
            if ($num > 0) {
                echo "$num";
                
                if ($num - 1 > 0) {
                    echo "*";
                }

                factorial($num - 1);
            }
            
        }

        factorial(3);
        
        ?>
    </body>
</html>
