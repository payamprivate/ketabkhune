<?php
include("db.php");
include("header.php");
include("slidebar.php"); ?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">
					<div class="ttl">ثبت سفارش - دریافت اطلاعات</div>
					<div class="pd-10" id="content-wrapper">
    <form action="" method="post" class="_form">
	<table border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="24%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th><label for="field_name">نام *</label></th>
			<td>				<input name="name" id="field_name" maxlength="30" type="text">
							</td>
		</tr>
				<tr>
		 
			<th><label for="field_family">نام خانوادگی *</label></th>
			<td>				<input name="lastname" id="field_family" maxlength="30" type="text">
							</td>
		</tr>
        
			<tr>
			<th><label for="field_family">نام کاربری *</label></th>
			<td>				<input name="username" id="field_family" maxlength="30" type="text">
		    </td></tr>
				<tr>
		 
			<th><label for="email">ایمیل *</label></th>
			<td>				<input name="email" id="field_email" dir="ltr" maxlength="255" size="50" type="text">
			
						</td>
		</tr>

				<tr>

			<th><label for="field_mobile">رمز عبور *</label></th>
			<td>				<input name="password" id="field_mobile" dir="ltr" type="password">
							</td>
		</tr>
				<tr>
                
			<th><label for="field_mobile">تکرار رمز عبور *</label></th>
			<td>				<input name="password2" id="field_mobile" dir="ltr" type="password">
							</td>
		</tr>
				<tr>
				  
				  <th><label for="field_zipcode">کد پستی *</label></th>
				  <td>				<input name="zipcode" id="field_zipcode" dir="ltr" type="text">
				    <div>کد پستی 10 رقمی</div>
				    
				    </td>
				  </tr>
				<tr>
		 
			<th><label for="field_address">آدرس *</label></th>
			<td>				<textarea name="address" id="field_address" cols="40" rows="4"></textarea>
								<div>آدرس کامل پستی</div>
			
						</td>
		</tr>
				<tr>
					<td colspan="2" class="buttons nobg">
							<input type="submit" value="ثبت نام" name="submit" class="text_only has_text button">
                <?php

 if ( isset($_POST["submit"]) ) {
	if ( !empty($_POST["name"]) AND !empty($_POST["address"]) AND !empty($_POST["lastname"]) AND !empty($_POST["username"]) AND !empty($_POST["zipcode"]) AND !empty($_POST["email"]) ){
		
		if ($_POST["password"] == $_POST["password2"]){

			$name=$_POST["name"];
			$lastname=$_POST["lastname"];
			$username=$_POST["username"];
			$address=$_POST["address"];
			$zipcode=$_POST["zipcode"];
			$email=$_POST["email"];
			$password=$_POST["password"];
			$password=md5($password);
			
			//check kardan inke user az ghabl vojod nadashte bashad
			$query="SELECT * FROM `users` WHERE `username` LIKE '$username'";
			$usermojod=mysql_query($query);
			
			if ( !mysql_num_rows($usermojod) >=1 ){
		
			//setting to utf8 inserting to database
			mysql_query("SET NAMES `utf8`");
			$query="insert into `users` ( `id` , `name` , `lastname` , `username` , `address` , `zipcode` , `email` , `password` ) VALUES ( NULL , '$name' , '$lastname', '$username', '$address', '$zipcode', '$email' , '$password' )";
			$add = mysql_query( $query )or die("<br/><br/><b>خطا در ورود اطلاعات به دیتابیس</b>".mysql_error()) ;
			echo "<br/></br>ثبت نام شما با موفقیت صورت گرفت";
			
			} else
				echo "این نام کاربری قبلا ثبت شده است,لطفا نام کاربری دیگری را انتخاب نمایید";
		
			} else
			echo " کلمه عبور شما باهم تطابق ندارد , لطفا دوباره چک کنید ";
		
		}
		else {
		echo "<br/><br/><b>
		خطا , لطفا اطلاعات وروردی را بصورت کامل وارد کنید و دوباره بررسی کنید</b>" ;
		}
		
 }

?>
						</td>
		</tr>
			</tbody></table>
</form>														</div>
				</div>
							<div class="cb"></div>
<?php include("pagefooter.php"); ?>


