<?php


		include("db.php");
		
		$a=0;
		$dd=1;

		
					$date1=date("h:i:sa");
					$time1=date("d-m-Y H:i:sa");
					
					
					$time_now=mktime(date('h')+4,date('i')+30,date('s'));
					$date= date('d-m-Y H:i:sa', $time_now);
					
				
			

					$insert_login_time=$con->prepare("insert into checktime(arrived,setonoff,username)value(Now(),'0','".$_COOKIE['email']."')");
						
					$insert_login_time->execute();
			
				$setoffline1=$con->prepare("update newuser set login=$time1 where username=".$_COOKIE['email']." ");
			
				$setoffline1->execute();
				
				
				$setoffline=$con->prepare("update newuser set set_online='$a' where set_online='$dd' ");
			
				$setoffline->execute();
				
				
		if(isset($_COOKIE['email'])and isset($_COOKIE['pass']))
		{

			$email=$_COOKIE['email'];
			$pass=$_COOKIE['pass'];
			
			setcookie('usernameget',$email,time()+60*60*7);
			
			setcookie('email',$email,time()-1);
			setcookie('pass',$pass,time()-1);
		}
		
		
					
					
						session_start();
						$_SESSION['loginout1']=$date;
					
					
				header("location:login_session.php");
			
?>