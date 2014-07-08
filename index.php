<?php
include("db.php");
include("header.php");
include("slidebar.php"); 

	if ( isset($_GET["amanat"]) ){
		
		
		$username=$_SESSION["username"];
		$amanat = $_GET["amanat"];
		$amanatq="INSERT INTO `barows` (`id` , `username` , `bookserial`) VALUES ( NULL , '$username', '$amanat' )";
		mysql_query($amanatq) or die("cant insert amanat data to database");
		
		$updateq="UPDATE `books` SET `status` = '0' WHERE `books`.`serial` =$amanat";
		mysql_query($updateq) or die("cant update amanat data to database".mysql_error() );
		
	}

?>

<?php
	
	$query="SELECT * FROM `books`";
	$result=mysql_query($query)or die("cant search the database");
	$rows=mysql_num_rows($result);
?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">

 
  					<div class="ttl">کتابخانه مجازی</div>
					<div class="pd-10" id="content-wrapper">
																			<div class="prod">
							<div class="text">
								<p style="text-align: center;">
	<br>
	<img align="middle" alt="پروژه کتابخانه مجازی" class="decoded" src="files/library6.jpg"></p>
<p style="text-align: center;">&nbsp;
	</p>
    
    </div>
</div>
<p style="text-align: justify;">
	<b> لیست کتاب های کتابخانه مجازی : </b><br/>
    
	<table class="_form" border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="12%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th><label for="field_name">نام کتاب</label></th><th><label for="field_name">دسته بندی</label></th>
            <th><label for="field_name">نویسنده</label></th><th><label for="field_name">توضیحات</label></th>
            <th><label for="field_name">سریال</label></th> <th><label for="field_name">وضعیت</label></th>
		</tr>
        
            <?
			
			if ($rows>=1){
				
				$bookname=array();
				$description=array();
				$serial=array();
				$writer=array();
				$status=array();
				$cat=array();
				while ($query_run=mysql_fetch_assoc($result) ){
					$bookname[]=$query_run['name'];
					$description[]=$query_run['description'];
					$writer[]=$query_run['writer'];
					$serial[]=$query_run['serial'];
					$cat[]=$query_run['cat'];
					$status[]=$query_run['status'];
				}
				
				for ($i=0; $i < $rows ; $i++){
					echo "<tr>";
					echo "<td>".$bookname[$i]."</td>";
					echo "<td>".$cat[$i]."</td>";
					echo "<td>".$writer[$i]."</td>";
					echo "<td>".$description[$i]."</td>";
					echo "<td>".$serial[$i]."</td>";
					if ( !$status[$i]==0 ){
						?>
                        <td>
                       <? if ( isset($_SESSION["username"]) ) { ?>
                        <center>
                        <a href="index.php?amanat=<? echo $serial[$i]; ?>" ><input type="button" name="submita" class="text_only has_text button" value="امانت گرفتن کتاب" /></a></center></td>
                        <? } else { ?>
                       <label><center> جهت امانت کتاب ابتدا باید لاگین کنید <br/></center></label><center>
                       <a href="login.php" ><input type="button" class="text_only has_text button" value="ورود" /></a>
                        </center>
                        </td>
                      <?  }
					} else { echo "<td><center><b> امانت داده شده </b></cenetr></td>"; }
					echo "</tr>";
					
							}
				
			?>
            
            </tbody></table>
            
            <?

			} else {
				echo "<br/><center><b> هیچ کتابی در پایگاه داده ها ثبت نشده است </b></center>";
			}
			?>
		




<br/>


<?php  include("pagefooter.php"); ?>