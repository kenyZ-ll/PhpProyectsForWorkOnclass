<?php 
    /* 
      5.  Realizar un programa en PHP que muestre un posible resultado de la bonoloto: 
      Se presentarán 6 números obtenidos aleatoriamente en el rango de 1 a 49 (ambos inclusive) 
      Los 5 primeros forman la jugada ganadora y deberán presentar ordenados de menor a mayor en una tabla html; 
      el sexto es el número complementario.  Por supuesto los números no pueden repetirse.

    */
      $generador = rand(1,49);
      $base = [$generador];
     
?>