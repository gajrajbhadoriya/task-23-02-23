<?php
for($i=5;$i>=1;$i--)
{   
    for($k=1;$k<=5-$i;$k++)
    {
        echo "&nbsp;&nbsp";
    }                                                                    
     for($j=1;$j<=$i;$j++)
     {
        echo "*&nbsp;&nbsp";
     }
     echo"<br/>";

}
for($i=1;$i<=5;$i++)
{   
    for($k=1;$k<=5-$i;$k++)
    {
        echo "&nbsp;&nbsp";
    }                                                                    
     for($j=1;$j<=$i;$j++)
     {
        echo "*&nbsp;&nbsp";
     }
     echo"<br/>";

}

?>