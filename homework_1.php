<html>
    <head>
        <title>Homework1</title>
        
        <style type="text/css">
         body {color: red}
         p.ex {color:rgb(0,0,255);}
         p.ex1 {color: black}
        </style>
    </head>
    <body>
        <?php
        //ZA DA VURVI POZVOLIAVAME gmp ot php extensions.
        
        $num=$_GET["number"];

        if (is_numeric($num))
        {
            
            if ($num<0 or $num>19999)
            {
                echo "The parameter is not within the range [0,19999]";
            }
            
            else
            {
              if (gmp_prob_prime($num)==0)
                {
                echo "<p class='ex'>The number $num is not prime.</p>";
                }
              if (gmp_prob_prime($num)==2)
              {
               echo "<p class='ex1'>The number $num is prime!</p>";
              }
              if (gmp_prob_prime($num)==1)
              {
                echo "The number $num might be prime.";
              }
            }
            
        }
        else
        {
        echo "The parameter is not a number";
        }
        ?>
    </body>
</html>