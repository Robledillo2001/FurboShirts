<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Array asociativo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    form {
      margin-bottom: 20px;
      font-size: 23px;
    }
    .resultado {
      margin-top: 20px;
      padding: 15px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <div class="resultado">
    <?php
        $calendario=[
          "Lunes"=>[
            "eventos"=>[
              "14:30"=>"Fregar",
              "17:00"=>"Estudiar PHP",
              "20:30"=>"Jugar"
            ]
          ],
          "Martes"=>[
            "eventos"=>[
              "9:00"=>"Ir a clase",
              "13:00"=>"Preparar comida",
              "16:00"=>"Estudiar fisica"
            ]
          ],
          "Miercoles"=>[
            "eventos"=>[
              "10:30"=>"Ir a clase",
              "13:55"=>"Comer",
              "19:00"=>"Recoger habitacion"
            ]
          ],
          "Jueves"=>[
            "eventos"=>[
              "7:30"=>"Ir a clase",
              "14:30"=>"Comer",
              "20:30"=>"Salir"
            ]
          ],
          "Viernes"=>[
            "eventos"=>[
              "7:30"=>"Ir a clase",
              "11:00"=>"Salir de clase",
              "12:00"=>"Irse al pueblo",
              "20:00"=>"Descansar"
            ]
          ],
          "Sabado"=>[
            "eventos"=>[
              "12:30"=>"Limpiar",
              "17:00"=>"Ver futbol",
              "00:30"=>"Salir por ahi"
            ]
          ],
          "Domingo"=>[
            "eventos"=>[
              "14:30"=>"Despertarse",
              "17:00"=>"Recoger",
              "20:30"=>"Irse",
              "22:00"=>"Repasar"
            ]
          ],
        ];
        var_dump($calendario);
    ?>
  </div>
</body>
</html>
