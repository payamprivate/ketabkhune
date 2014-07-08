<?php
include("db.php");
include("header.php");
include("slidebar.php");

	// agar dokme hazf va passdadan ketab ro zad , ketab dar
	if ( isset($_GET["hazf"]) and isset($_SESSION['username']) ){
		
		$username=$_SESSION["username"];
		$hazf = $_GET["hazf"];
		$amanatq="DELETE FROM `barows` WHERE `username` LIKE '$username' AND `bookserial` =$hazf";
		
		mysql_query($amanatq) or die("cant delete data on database");
		
		$updateq="UPDATE `books` SET `status` = '1' WHERE `books`.`serial` =$hazf";
		mysql_query($updateq) or die("cant update hazf data to database".mysql_error() );
		
	}
	 ?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">
					<div class="ttl">کتاب های امانت گرفته شده توسط کاربر</div>
					<div class="pd-10" id="content-wrapper">
<?php
 	if ( isset($_SESSION['username']) ) {
		$username=$_SESSION['username'];
		$query="SELECT * FROM `barows` WHERE `username` = '$username'";
		$result=mysql_query($query)or die("cant search the database ");
		$bookserial=array();
		$num_rows=mysql_num_rows($result);
		if ($num_rows>=1 ){
		for ($i=0;$i<$num_rows;$i++){
				$bookserial[]=mysql_result($result,$i,'bookserial');
				//echo $bookserial[$i].'<br/>';
		}
		?>
        
        <table class="_form" border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="12%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th><label for="field_name">نام کتاب</label></th><th><label for="field_name">دسته بندی</label></th>
            <th><label for="field_name">نویسنده</label></th><th><label for="field_name">توضیحات</label></th>
            <th><label for="field_name">سریال</label></th> <th><label for="field_name">پس دادن کتاب</label></th>
		</tr>
        	<tr>
            
        <?php
		for ($i=0;$i<$num_rows;$i++){
			
			$query="SELECT * FROM `books` WHERE `serial` =$bookserial[$i]";
			$result=mysql_query($query) or die("cant search book from database");
			$numbook=mysql_num_rows($result);
			if ($numbook==0) {
				echo "<li>این کتاب دیگر در دیتا بیس موجود نیست</li>";
			}
			else
			{
				$bookname=mysql_result($result,0,'name');
				$bookcat=mysql_result($result,0,'cat');
				$bookdescription=mysql_result($result,0,'description');
				$bookwriter=mysql_result($result,0,'writer');
				?>
                
			<tr>
            <td><? echo $bookname ?></td>
            <td><? echo $bookcat ?></td>
            <td><? echo $bookwriter ?></td>
            <td><? echo $bookdescription ?></td>
            <td><? echo $bookserial[$i] ?></td>
            <td><center><a href="peygiri.php?hazf=<? echo $bookserial[$i]; ?>" ><input type="button" name="hazf" class="text_only has_text button" value="پس دادن کتاب" /></a></center></td>
            </tr>
			</tbody></table>
</form>	
                <?php
			}
				
		}
		
		} else
			echo "<br/><center><b>هیچ کتابی توسط شما به امانت گرفته نشده</b></center>";
			
	}else
		echo "<br/><center><b>لطفا جهت مشاهده کتب امانت گرفته شده ابتدا با نام کاربری خود وارد سایت شوید <br/>
		جهت ورود میتوانید <a href='login.php' >>>اینجا<<</a> را کلیک کنید </b></center>";
?>
    
   
                <?php
	
	
 	
			?>
  
													</div>
				</div>
							<div class="cb"></div>
<?php include("pagefooter.php"); ?>


