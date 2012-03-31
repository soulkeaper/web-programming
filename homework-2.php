<html>
<head>
    <title>Homework2</title>
</head>
<body>
    <?php
    
    $arr=range(20,1000,37);
    
    function find_3_prime($ar)
    {
        $i=0;
     foreach($ar as $val)
     {
        
      if (gmp_prob_prime($val)==2)
      {
        ++$i;
      }
      if ($i==3)
      {
        $i=0;
       echo "$val </br>";
      }
     }
    }
    find_3_prime($arr);
    
    function check_exists($ar)
    {
        if (in_array(146,$ar))
          {
            echo "The number 146 exist in the array" ;
          }
          else
          {
            echo "The number 146 does not exist in the array </br>";
          }
          
        if (in_array(284,$ar))
        {
        echo "The number 284 exist in the array";
        }
        else
        {
            echo "The number 284 does not exist in the array </br>";
        }
        
        if (in_array(871,$ar))
        {
            echo "The number 871 exist in the array";
        }
        else
        {
            echo "The number 871 does not exist in the array </br>";
        }
    }
    check_exists($arr);
    ?>
</body>
</html>