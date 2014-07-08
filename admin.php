<?php
include("db.php");
include("header.php");
include("slidebar.php"); ?>

		<div class="left content">
			<div class="inner" id="container">
					<div class="round-10 white shadow mgb-10">
					<div class="ttl">ورود مدیر</div>
					<div class="pd-10" id="content-wrapper">
<?php

if ( isset($_POST["logout"]) ) {
	// logout kardan karbar
	session_destroy();
	// ferestadan karbar be safe asli site
	header("Location:index.php");
}

// agar karbar az ghabl login karde bud:
if ( isset($_SESSION['admin']) and $_SESSION['admin']==="true" ){

?>
	<p align="justify"><b>افزودن کتاب جدید به کتابخانه:</b></p>
    <form action="" method="post" class="_form">
	<table border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="24%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody>
                
                <tr>
			    <th><label for="field_name">اسم کتاب *</label></th>
			    <td><input name="book" id="field_name" maxlength="30" type="text">
				</td></tr>
                
                <tr>
			    <th><label for="field_name">نویسنده ( مترجم ) *</label></th>
			    <td><input name="writer" id="field_name" maxlength="30" type="text">
				</td></tr>

        
		 	<tr>
			<th><label for="email">سریال *</label></th>
			<td>				<input name="serial" dir="ltr" maxlength="30" type="text">
            </td>
            </tr>
            
            <tr>
			<th><label for="field_family">دسته بندی *</label></th><td>
            <select id="field_family" maxlength="50" name="cat">
			<option value="کامپیوتر" selected>کامپیوتر</option>
			<option value="داستان و رمان">رمان</option>
            <option value="علمی" >موسیقی</option>
			<option value="علمی" >علمی</option>
			<option value="درسی">درسی</option>
            <option value="ادبیات">ادبیات</option>
			</select>
			</td></tr>
            
            <tr>
			<th><label for="field_family">توضیحات *</label></th>
			<td>				<textarea name="description" id="field_address" cols="40" rows="4"></textarea>
		    </td></tr>
	

				<tr>
					<td colspan="2" class="buttons nobg">
							<input type="submit" value="ثبت کتاب" name="add" class="text_only has_text button">
                <?php

if ( isset($_POST["add"]) ) {
	if ( !empty($_POST["book"]) AND !empty($_POST["description"]) AND !empty($_POST["serial"]) AND !empty($_POST["cat"]) AND !empty($_POST["writer"]) ){
		
			$book=$_POST["book"];
			$description=$_POST["description"];
			$serial=$_POST["serial"];
			$cat=$_POST["cat"];
			$writer=$_POST["writer"];
			
			//check kardan inke seriale ketab az ghabl dar database vojod nadashte bashad
			$query="SELECT * FROM `books` WHERE `serial` LIKE '$serial'";
			$usermojod=mysql_query($query);
			
			if ( !mysql_num_rows($usermojod) >=1 ){
		
			//setting to utf8 inserting to database
			mysql_query("SET NAMES `utf8`");
			$query="INSERT INTO `ketabkhone`.`books` (`id`, `name`, `description`, `writer`, `cat`, `serial`, `status`) VALUES (NULL, '$book', '$description', '$writer', '$cat', '$serial', '1');";
			$add = mysql_query( $query )or die("<br/><br/><b>خطا در ورود اطلاعات به دیتابیس</b>".mysql_error()) ;
			echo "<br/></br>ثبت کتاب در دیتابیس با موفقیت انجام شد";
			
			} else
				echo "کتابی با این شماره سریال قبلا در کتابخانه ثبت شده است.";
		
		
		}
		else {
		echo "<br/><br/><b>خطا , لطفا اطلاعات وروردی را بصورت کامل وارد کنید و دوباره بررسی کنید</b>" ;
		}
		
 }

?>
						</td>
		</tr>
			</tbody></table>
</form>
  
  


	<p align="justify"><b>حذف کتاب از کتابخانه:</b></p>
    <form action="" method="POST" class="_form">
	<table border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="24%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody>
                
                <tr>
			    <th><label for="field_name">شماره سریال کتاب *</label></th>
			    <td><input name="hserial" id="field_name" maxlength="30" type="text">
				</td></tr>

				<tr>
					<td colspan="2" class="buttons nobg">
							<input type="submit" value="حذف کتاب" name="hazf" class="text_only has_text button">
                <?php

	if ( isset($_POST["hazf"]) AND !empty($_POST["hserial"]) ) {

			$hserial=intval($_POST["hserial"]);
			
			
			//check kardan inke seriale ketab az ghabl dar database vojod nadashte bashad
			$query="SELECT * FROM `books` WHERE `serial` LIKE '$hserial'";
			$resultt = mysql_query($query) or die("cant delete book from database");
			
				if ( mysql_num_rows($resultt) >=1 ) {
				$query="DELETE FROM `books` WHERE `serial` LIKE '$hserial'";
				mysql_query($query) or die("cant delete book from database <br/>".mysql_error());
			
				echo "<b><br/>کتاب مورد نظر با موفقیت از دیتابیس حذف گردید </b>";
				} else {
					echo "<br/><b>کتابی با این سریال در دیتابیس پیدا نشد</b>";	}
			} else if ( isset($_POST["hazf"]) AND empty($_POST["hserial"]) ) {
				?>
				
		<br/><br/><b>
		خطا , لطفا اطلاعات وروردی را بصورت کامل وارد کنید و دوباره بررسی کنید</b>
        
        <?php
			}
	
?>
						</td>
		</tr>
			</tbody></table>
</form>
<?php
        } else { ?>



    
    <form action="" method="post" class="_form">
	<table border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="24%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th>نام کاربری مدیر</th>
			<td>				<input name="username" id="field_name" maxlength="50" type="text">
							</td>
		</tr>
				<tr>
		 
			<th><label for="field_family">رمز عبور</label></th>
			<td>				<input name="password" id="field_family" maxlength="40" type="password">
							</td>
		</tr>
				<tr>
					<td colspan="2" class="buttons nobg">
							<input type="submit" value="ورود" name="submit" class="text_only has_text button">
                <?php

 if ( isset($_POST["submit"]) ) {
	if ( !empty($_POST["username"]) AND !empty($_POST["password"]) ){
		$username= htmlentities($_POST["username"]);
		$password=md5($_POST["password"]);
		
		// checking databaste

		$query="SELECT * FROM `admin` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";

		$result = mysql_query( $query )or die("<br/><br/><b>خطا در چک کدرن اطلاعات دیتابیس</b>".mysql_error()) ;
		
		$numrows=mysql_num_rows($result);
		
		//$query_row = mysql_fetch_assoc($query) ;
		if ( $numrows>=1) {
			$email= mysql_result($result,0,'email');
			$username=mysql_result($result,0,'username');

			//echo "<br/> $name عزیز ورود شما با موفقیت انجام شد";
			$_SESSION['email']=$email;
			$_SESSION['admin']="true";
			
			header("Location:admin.php");
			}
			else{
			echo "<br/> نام کاربری یا رمز عبور اشتباه است";
			}
		
		}
		else {
		echo "<br/><br/><b>
		خطا , لطفا اطلاعات وروردی را مجددا چک کنید و تصحیح کنید</b>" ;
		}
		?>
        
        						</td>
		</tr>
			</tbody></table>
</form>

<?
 }
}
?>
														</div>
				</div>
							<div class="cb"></div>
<?php include("pagefooter.php"); ?>


