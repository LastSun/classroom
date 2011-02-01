<?php

	session_start();

	include '../configure.php';
	
	htmlhead("none","ui");

	addjs("appview.js");
	
	htmlheadend();
?>

	<form action="<?php echo $domain; ?>/model/saveapp.php" method="post">
		<p><input type="hidden" name="roomid" id="roomid" value="<?php echo $_GET['roomid']; ?>" /></p>
		<p>
			<label>申请时间段:</label>
		</p>
		<div id="starttime">
		</div>
		<div id="starttime1">
			<p>
				<input size="4" type="text" name="startyear" id="startyear" value="<?php echo date("Y"); ?>" />
				年
				<input size="2" type="text" name="startmonth" id="startmonth" value="<?php echo date("m"); ?>" />
				月
				<input size="2" type="text" name="startday" id="startday" value="<?php echo date("d"); ?>" />
				日
			</p>
			<p>
				<select name="starthour">
				<?php 
					for($i = 0;$i < 24;$i++) echo "<option value=$i>$i</option>"
				?>
				</select>
				时
				<select name="startmin">
				<?php 
					for($i = 0;$i < 60;$i++) echo "<option value=$i>$i</option>"
				?>
				</select>
				分
			</p>
		</div>
		<div id="endtime">
			<p>
				<input size="4" type="text" name="endyear" id="endyear" value="<?php echo date("Y"); ?>" />
				年
				<select name="endmonth" id="endmonth">
				<?php 
					for($i = 1;$i <= 12;$i++)
					{
						echo "<option value=$i ";
						if ($i==date("m")) echo "select='select'";
						echo ">$i</option>";
					}
				?>
				</select>
				月
				<select name="endday" id="endday">
				<?php 
					for($i = 1;$i <= cal_days_in_month($calendar, $i, $year);$i++)
					{
						echo "<option value=$i ";
						if ($i==date("d")) echo "select='select'";
						echo ">$i</option>";
					}
				?>
				</select>
				日
			</p>
			<p>
				<select name="endhour" id="endhour">
				<?php 
					for($i = 0;$i < 24;$i++) echo "<option value=$i>$i</option>"
				?>
				</select>
				时
				<select name="endmin" id="endmin">
				<?php 
					for($i = 0;$i < 60;$i++) echo "<option value=$i>$i</option>"
				?>
				</select>
				分
			</p>
		</div>
		<p><input type="submit" value="确定" /></p>
	</form>
	
<?php
	echo $_GET['roomid'];
	
	htmltail();
?>
