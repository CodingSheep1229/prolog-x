<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"></meta>
	<title>Prolog</title>
	<?php
date_default_timezone_set("Asia/Taipei");
$this->load->helper('url');
$this->load->view('empty.php');

?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="prolog-x/css/prolog.css">
</head>
<body>
<?php
echo form_open('user/register' , $attributes);
   ?>
	<div id="picture-space">
		<img id='prolog-pic' src="prolog-x/image/prolog_text.png">
	</div>
	<div class="container btn-row" id="select-bar">
		<div class="row">
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-intro" class="bar-button">&emsp;&emsp;簡介&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-schedule" class="bar-button">&emsp;&emsp;流程&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-register" class="bar-button">&emsp;&emsp;報名&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-pay" class="bar-button">&emsp;&emsp;匯款&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-game" class="bar-button">&emsp;&emsp;遊戲&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="select-contact" class="bar-button">&emsp;&emsp;聯絡&emsp;&emsp;</span>
			</span>
		</div>
	</div>
	<div class="container btn-row" id="fixed-bar">
		<div class="row">
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-intro" class="bar-button">&emsp;&emsp;簡介&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-schedule" class="bar-button">&emsp;&emsp;流程&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-register" class="bar-button">&emsp;&emsp;報名&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-pay" class="bar-button">&emsp;&emsp;匯款&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-game" class="bar-button">&emsp;&emsp;遊戲&emsp;&emsp;</span>
			</span>
			<span class="col-md-2 col-sm-4 col-xs-6">
				<span id="fixed-contact" class="bar-button">&emsp;&emsp;聯絡&emsp;&emsp;</span>
			</span>
		</div>
	</div>
	<a id='intro' class="anchor" name="intro"></a>
	<div id="intro-space">
		<div id="basic-info">
			<div style="padding-left: 2vw;">時間：8/29 ~ 8/31</div>
			<a target="_blank" href="https://www.facebook.com/gocamping6/">
				<div style="padding-left: 2vw; margin-bottom: 1.5vw; color: #FFF0AC;">
					地點：流星花園露營區</div>
			</a>
		</div>
		<div id="intro-text">
			<!--按下按鈕就插入文字-->
		</div>
		<img id="book-pic" src="prolog-x/image/book.png" alt="理論上這裡要有一本書">
		<div id="book-btn"></div>
	</div>
	<!-- 	<a id='schedule' class="anchor" name="schedule"></a>
	<div class="container-fluid" id="schedule-space">
		<div class="row" style="top: 9vw; position: relative;">
			<div class="col-sm-4 col-xs-4"></div>
			<img class="col-sm-6 col-xs-6" src="prolog-x/image/schedule.png" id="schedule-form">
			<div class="col-sm-2 col-xs-2"></div>
		</div>
	</div> -->
	<a id='schedule' class="anchor" name="schedule"></a>
	<div id="schedule-space">
		<!-- <div id="schedule-img-space">
			<img src="prolog-x/image/schedule.png" id="schedule-form">
		</div> -->
	</div>
	<div id="first-footer">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
				<li data-target="#carousel-example-generic" data-slide-to="5"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="prolog-x/image/foot1.jpg">
					<div class="carousel-caption">
					</div>
				</div>
				<div class="item">
					<img src="prolog-x/image/foot2.jpg">
					<div class="carousel-caption">
					</div>
				</div>
				<div class="item">
					<img src="prolog-x/image/foot3.jpg">
					<div class="carousel-caption">
					</div>
				</div>
				<div class="item">
					<img src="prolog-x/image/foot4.jpg">
					<div class="carousel-caption">
					</div>
				</div>
				<div class="item">
					<img src="prolog-x/image/foot5.jpg">
					<div class="carousel-caption">
					</div>
				</div>
				<div class="item">
					<img src="prolog-x/image/foot6.jpg">
					<div class="carousel-caption">
					</div>
				</div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>
	</div>
	<a id='register' class="anchor" name="register"></a>
	<div id="register-space">
		<div id='reg'>
			<div class="form-group">
				<label>姓名：</label>
				<input name="name" type="text" style="width:18vw;" maxlength="32" class="form-control input-block" placeholder="記得輸入本名rrrrr" />
			</div>
			<div class="form-group">
				<label>出生年月日：</label>
				<input name="birthday" type="date" style="width:11.75vw;" maxlength="32" class="form-control input-block" />
			</div>
			<div class="form-group">
				<label>生理性別：
					<input type="radio" class="form-check-input" name="gender" value="男"> 男
					<input type="radio" class="form-check-input" name="gender" value="女"> 女
				</label>
			</div>
			<div class="form-group">
				<label>電子郵件：</label>
				<input name="email" type="email" style="width:20vw;" maxlength="128" class="form-control input-block" placeholder="填學校的或自己的皆可" />
			</div>
			<div class="form-group">
				<label>聯絡電話：</label>
				<input name="phone" type="tel" style="width:20vw;" maxlength="32" class="form-control input-block" placeholder="Ex: 09XXXXXXXX" />
			</div>
			<div class="form-group">
				<label>緊急聯絡人：</label>
				<input name="emergency_contact" type="text" style="width:15vw;" maxlength="9" class="form-control input-block" placeholder="緊急聯絡人的名字" />
			</div>
			<div class="form-group">
				<label>緊急聯絡人電話：</label>
				<input name="emergency_phone" type="tel" style="width:20vw;" maxlength="32" class="form-control input-block" placeholder="Ex: 09XXXXXXXX" />
			</div>
			<div class="form-group">
				<label>與緊急聯絡人的關係：</label>
				<input name="emergency_relation" type="text" style="width:18vw;" maxlength="9" class="form-control input-block" placeholder="Ex: 父子/母子/祖孫..." />
			</div>
			<div class="form-group">
				<label>身分證字號：</label>
				<input id="idd" name="id" type="text" style="width:25vw;" maxlength="32" class="form-control input-block" placeholder="Ex: 輸入你的身分證字號，保險用的" />
			</div>
			<div class="form-group">
				<label>營服尺寸：</label>
				<select class="form-control input-block" name="size" style="max-width: 10vw;">
					<option value='XS'>XS</option>
					<option value='S'>S</option>
					<option value='M' SELECTED>M</option>
					<option value='L'>L</option>
					<option value='XL'>XL</option>
					<option value='2L'>2L</option>
					<option value='3L'>3L</option>
				</select>
				<label id="cloth-size-btn" class="btn btn-sm btn-xs">尺寸</label>
			</div>
			<div class="form-group">
				<label>特殊食性：</label>
				<input name="eat" type="text" style="width:30vw;" maxlength="32" class="form-control input-block" placeholder="有沒有特別不吃什麼的，沒有就填無" />
			</div>
			<div class="form-group">
				<label>備註：</label>
				<input name="other" type="text" style="width:45vw;" maxlength="128" class="form-control input-block" placeholder="有什麼想告訴我們的，或是哪幾天不能到都麻煩在這告訴我們：）" />
			</div>
			<button name="Submit" type="submit" value="報名" class="btn btn-primary btn-sm btn-xs">報名</button>

			

			<!-- <span>姓名：</span>
			<input name="name" type="text" style="width:18vw;" maxlength="32" placeholder="記得輸入本名rrrrr" />
			<br>
			<span>出生年月日:</span>
			<input name="birthday" type="date" style="width:11.75vw;" maxlength="32" />
			<br>
			<span>生理性別:</span>
			<input type="radio" name="gender" value="男"> 男
			<input type="radio" name="gender" value="女"> 女
			<br>
			<span>電子郵件:</span>
			<input name="email" type="email" style="width:20vw;" maxlength="128" placeholder="填學校的或自己的皆可" />
			<br>
			<span>連絡電話:</span>
			<input name="phone" type="tel" style="width:20vw;" maxlength="32" placeholder="Ex: 09XXXXXXXX" />
			<br>
			<span>緊急聯絡人:</span>
			<input name="emergency_contact" type="text" style="width:15vw;" maxlength="9" placeholder="緊急聯絡人的名字" />
			<br>
			<span>緊急連絡人電話:</span>
			<input name="emergency_phone" type="text" style="width:20vw;" maxlength="32" placeholder="Ex: 09XXXXXXXX" />
			<br>
			<span>與緊急聯絡人的關係:</span>
			<input name="emergency_relation" type="text" style="width:18vw;" maxlength="9" placeholder="Ex: 父子/母子/祖孫..." />
			<br>
			<span>身分證字號:</span>
			<input id='idd' name="id" type="text" style="width:25vw;" maxlength="32" placeholder="Ex: 輸入你的身分證字號，保險用的" />
			<br>
			<span>營服尺寸:</span>
			<select name="size">
				<option value='XS'>XS</option>
				<option value='S'>S</option>
				<option value='M' SELECTED>M</option>
				<option value='L'>L</option>
				<option value='XL'>XL</option>
				<option value='2L'>2L</option>
				<option value='3L'>3L</option>
			</select>
			<span id="cloth-size-btn" class="btn btn-sm btn-xs">尺寸</span>
			<br>
			<span>特殊食性:</span>
			<input name="eat" type="text" style="width:47vw;" maxlength="32" placeholder="有沒有特別不吃什麼的，沒有就填無" />
			<br>
			<span>備註:</span>
			<input name="other" type="text" style="width:50vw;" maxlength="128" placeholder="有什麼想告訴我們的，或是哪幾天不能到都麻煩再這告訴我們：）" />
			<br>
			<input id='sub' name="Submit" type="submit" value="報名" class="btn btn-sm btn-xs" style="padding-top: 0vw;"> -->
		</div>
	</div>
	<a id="pay" class="anchor" name="pay"></a>
	<div id="pay-space">
		<div id="pay-text">
			銀行名稱：華南銀行 (代號008)
			<br>分行名稱：北桃園分行 (代號244)
			<br>帳號：244200573409
			<br>戶名：徐遠志
			<br>費用：3500元整
			<br>報名與繳費期限：即日起至8/20
			<br>匯款完成後請將匯款帳號後五碼寄到
			<br>b05705046@ntu.edu.tw 
			給我們做確認：）
		</div>
	</div>
	<a id="game" class="anchor" name="game"></a>
	<div id="game-space" class="hidden-sm hidden-xs">
		<div id="game-help-text">
			<br>故事背景:
			<br>遊戲的主角-漢威-是一個讀書人。
			<br>他熱愛讀書，正所謂一小時不讀書，便覺面目可憎。
			<br>你現在要幫助漢威，讓他保持清醒並認真讀書。
			<br>因為漢威是一個嚴謹的人，他不允許任何一條知識被略過，
			<br>所以當有一本書的知識沒被漢威吸收到，他就會崩潰。
			<br>所謂K書，並不是拿頭或者身體去K書，
			<br>所以拿漢威的身體去K書，他也會崩潰。
			<br>
			<br>操作說明:
			<br>[a or <-]:向左走; [d or ->]:向右走
			<br>[w]:跳躍; [滑鼠左鍵]:射擊(小心子彈數量喔，雖然會慢慢補充，但還是要把理解力花在刀口上)
			<br>[e]:喝能量補給飲料，漢威振奮五秒，用身體K書或被石頭打也不會痛了。(即畫面左上角protect)(每30秒會送1瓶)
			<br>小心上方落石，他會把漢威擊暈讓他不能讀書。
			<br>問號 + 是武器升級，讓漢威讀書"一以貫之","融會貫通"5秒鐘，想要考高分的話很重要。
			<br>在遊戲右半邊獲取知識可以獲得兩倍分數，這叫做讀書效率。
			<br>左界線和右界線是相通的。
			<br>
			<br>備註:
			<br>因為製作人懶散，所以此遊戲只有電腦才能玩QQ，在此致歉。
			<br>又是因為製作人懶散，所以要重玩就按[F5]刷新網站吧!
			<br>將遊戲分數截圖，或許宿營當天會有奇妙的事情發生在你身上喔。
			<br>_</div>
		<div id="enchant-stage"></div>
		<div id="game-help" class="btn btn-sm btn-xs">遊戲說明</div>
	</div>
	<div id="game-alternative" class="hidden-md hidden-lg hidden-xl">
		<p style="margin: 0;">
		<br><br>Sorry目前只有電腦能玩噢<br>或是你的螢幕不夠寬<br><br><br>
		</p>
	</div>
	<a id="contact" class="anchor" name="contact"></a>
	<div class="container-fluid" id="contact-space">
		<div class="row" id="contact-text">
			<div class="col-sm-4 col-md-4 col-xs-4">
				<a target="_blank" href="https://www.facebook.com/profile.php?id=100000302855014&fref=ts">	
					<img src="prolog-x/image/yiru.png" class="img-responsive img-circle pic">
				</a>
				<p>隊輔長
					<br>簡翊如
					<br>0989-265-165</p>
			</div>
			<div class="col-sm-4 col-md-4 col-xs-4">
				<a target="_blank" href="https://www.facebook.com/herofrank?fref=ts">
					<img src="prolog-x/image/han.png" class="img-responsive img-circle pic">
				</a>
				<p>副召
					<br>陳漢威
					<br>0975-932-702</p>
			</div>
			<div class="col-sm-4 col-md-4 col-xs-4">
				<a target="_blank" href="https://www.facebook.com/profile.php?id=100002029314996">
					<img src="prolog-x/image/wei.png" class="img-responsive img-circle pic">
				</a>
				<p>隊輔長
					<br>李和維
					<br>0975-510-169</p>
			</div>
		</div>
	</div>
	<?=form_close()?>
</body>
<footer>
	<center>copyright © 2017 NTUIM. all rights reserved</center>
</footer>
<script type="text/javascript" src="prolog-x/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="prolog-x/js/bootstrap.min.js"></script>
<script type="text/javascript" src="prolog-x/game/enchant.js"></script>
<script type="text/javascript" src="prolog-x/game/game.js"></script>
<script type="text/javascript" src="prolog-x/js/prolog.js"></script>
<script type="text/javascript" src="prolog-x/js/jquery-ui.min.js"></script>

</html>

<?php
$this->session->set_flashdata('redirect_from', current_url());
?>