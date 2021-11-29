<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        trait A {

            private $a = 3;
            private $b;
            private $c;

            public function prueba() {
                echo "soy A";
            }

        }

        trait B {
            use A;

            private $d;
            private $e;
            private $f = 9;
            //protected $a = 7;

            public function prueba() {
                echo "soy B";
            }

        }

        Class C {
            use B, A;
            public function __get($name) {
                return $this->$name;
            }

        }

        $prueba = new C;
        $prueba->prueba();
        ?>
    </body>
</html>
