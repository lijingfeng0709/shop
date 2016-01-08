<?php
 /* 连主库 */
        $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    /* 连从库 */
    /*
        $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
    */
        if($link)
            {
                mysql_select_db(app_bellei,$link);
                //your code goes here
				$sql = @mysql_query("insert into time values(now())");
				$sql1 = @mysql_query("select * as he from time");
				$rs=@mysql_fetch_array($sql1);
 					 echo $rs['he'];
						
            }else{
				echo "1234";
				}
		mysql_close($link);	

?>