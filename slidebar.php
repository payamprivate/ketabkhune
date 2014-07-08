		<div class="right sidebar">
			
			<div class="white2 menu">
				<div class="ttl">منوی اصلی</div>
				<div class="pd-10">
					<ul class="vul">
                    <? if (isset( $_SESSION['name'] ) ){?>
                    <p align="center"> خوش آمدید <? echo $_SESSION['name']; ?> عزیز
                    <? } ?>
						<li class="first"><a href="index.php" title="صفحه اصلی فروشگاه">صفحه اصلی</a></li>
                        
                    <? if (!isset( $_SESSION['name'] ) ){?>
						<li><a href="login.php" title="داشبورد">ورود کاربر</a></li>
                    <? } ?>

						<li class="last"><a href="about.php" title="">درباره پروژه</a></li>
					</ul>
				</div>
			</div>
            
			<div class="white2 menu">
		    <div class="ttl">دسته بندی کتاب ها</div>
				<div class="pd-10">
					<ul id="latest_products_list" class="latest_products_list">
                    <li><a href="cat.php?cat=کامپیوتر">کامپیوتر</a></li>
                    <li><a href="cat.php?cat=داستان">داستان</a></li>
                    <li><a href="cat.php?cat=موسیقی">موسیقی</a></li>
                    <li><a href="cat.php?cat=علمی">علمی</a></li>
                    <li><a href="cat.php?cat=درسی">درسی</a></li>
                    <li><a href="cat.php?cat=ادبیات">ادبیات</a></li>
                    </ul></div>
			</div>

		</div>