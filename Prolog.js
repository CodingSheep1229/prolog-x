let barPosition = $('#select-bar').offset();
let barWidth = document.getElementById('select-bar').offsetWidth;
let barHeight = document.getElementById('select-bar').offsetHeight;
let anchors = [
    [$('#intro').offset(), $('#fixed-intro')],
    [$('#schedule').offset(), $('#fixed-schedule')],
    [$('#register').offset(), $('#fixed-register')],
    [$('#pay').offset(), $('#fixed-pay')],
    [$('#game').offset(), $('#fixed-game')],
    [$('#contact').offset(), $('#fixed-contact')],
];
let now = 0;

// sticker bar
$('a').css('color','white');
$(window).scroll(function() {
    if ($(window).scrollTop() + 1 > barPosition.top) {
        $('#fixed-bar').css('display', 'block').css('width', barWidth);
        $('#select-bar').css('visibility', 'hidden');
    } else {
        $('#fixed-bar').css('display', 'none');
        $('#select-bar').css('visibility', 'visible');
    }

    for (i = anchors.length - 1; i >= 0; i--) {
        if ($(window).scrollTop() + 1 > anchors[i][0].top) {
            anchors[now][1].css('color', 'white').css('background-color', 'black');
            anchors[i][1].css('color', 'black').css('background-color', 'white');
            now = i;
            break;
        } else {
            anchors[i][1].css('color', 'white').css('background-color', 'black');
        }
    }

});

let bookbtn = document.getElementById('book-btn');
let bookbtn_status = 0;
bookbtn.addEventListener('click', (event) => {
	bookbtn_status++;
	if (bookbtn_status > 3)
		bookbtn_status -= 3;

	var text = document.getElementById("intro-text");
	if (bookbtn_status == 1) {
		text.style.visibility = "visible";
		text.innerHTML = "1999年他在這個世界醒來<br>沒有幾個人知道他的存在<br>於是他跟著愛麗絲夢遊她的魔幻世界<br>與仙杜瑞拉在南瓜馬車上分享彼此的夢想<br>慫恿愛穿新衣的國王穿上他特製的那套禮服<br>在成為國家級臥底之前<br>他在一千零一個童話裡闖蕩<br>也可以說那一千零一個童話<br>是因他而寫因他而生因他而在";
	} else if (bookbtn_status == 2) {
		text.innerHTML = "愛麗絲是他交到的第一個朋友<br>她曾告訴過他<br>時間是很重要的<br>於是他答應了穿著新衣的國王的徵召<br>成為皇家御用臥底<br>也在接受嚴苛訓練的同時<br>寫下第一千零二個故事<br>這次<br>他是主角<br>代號：紅心皇后";

	} else if (bookbtn_status == 3) {
		text.innerHTML = "撲克牌有四種花色<br>在皇家駭客組織的系統裡<br>他們能代表著一個人的過去將來<br>紅心 梅花 黑桃 方塊<br>伸出手抽兩張牌<br>你的過去與將來<br>會怎麼寫？";
	}
})


$(document).ready(function() {
    $("#select-intro").click(function() {
        $('html, body').animate({
            scrollTop: $("#intro").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#select-schedule").click(function() {
        $('html, body').animate({
            scrollTop: $("#schedule").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#select-register").click(function() {
        $('html, body').animate({
            scrollTop: $("#register").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#select-pay").click(function() {
        $('html, body').animate({
            scrollTop: $("#pay").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#select-game").click(function() {
        $('html, body').animate({
            scrollTop: $("#game").offset().top
        }, 1200, 'easeInOutExpo');
    });
    $("#select-contact").click(function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#fixed-intro").click(function() {
        $('html, body').animate({
            scrollTop: $("#intro").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#fixed-schedule").click(function() {
        $('html, body').animate({
            scrollTop: $("#schedule").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#fixed-register").click(function() {
        $('html, body').animate({
            scrollTop: $("#register").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#fixed-pay").click(function() {
        $('html, body').animate({
            scrollTop: $("#pay").offset().top
        }, 2000, 'easeInOutExpo');
    });
    $("#fixed-game").click(function() {
        $('html, body').animate({
            scrollTop: $("#game").offset().top
        }, 1200, 'easeInOutExpo');
    });
    $("#fixed-contact").click(function() {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 2000, 'easeInOutExpo');
    });

});