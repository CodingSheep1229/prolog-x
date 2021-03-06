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

// resize the width of bar
$(window).resize(function() {
    $("#fixed-bar").css('width', '100%');
    $("#select-bar").css('width', '100%');
    barPosition = $('#select-bar').offset();
    barWidth = document.getElementById('select-bar').offsetWidth;
    barHeight = document.getElementById('select-bar').offsetHeight;
    anchors = [
        [$('#intro').offset(), $('#fixed-intro')],
        [$('#schedule').offset(), $('#fixed-schedule')],
        [$('#register').offset(), $('#fixed-register')],
        [$('#pay').offset(), $('#fixed-pay')],
        [$('#game').offset(), $('#fixed-game')],
        [$('#contact').offset(), $('#fixed-contact')],
    ];
});

// sticker bar
$('a').css('color', 'white');
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


//book-btn float
let book_top = 13;
let book_move_unit = 0.2;

function timedCount() {
    if (book_top > 13 || book_top < 11)
        book_move_unit *= -1;
    book_top += book_move_unit;
    let book = document.getElementById('book-pic');
    $("#book-pic").css('top', book_top + 'vw');
    let t = setTimeout("timedCount()", 100);
    // console.log(book_top);
}
timedCount();

//book-btn hover
let bookbtn_status = 0;
$("#book-btn").hover(function() {
    $("#book-pic").attr('src', 'prolog-x/image/book-hover.png');
}, function() {
    if(bookbtn_status == 0){
        $("#book-pic").attr('src', 'prolog-x/image/book.png');
    }
    else{
        $("#book-pic").attr('src', 'prolog-x/image/book-next.png');
    }
});

//book-btn click
let book_i = 0;

function apear() {
    $('#intro-text').css('opacity', 0.05 * book_i);
    book_i++;
    if (book_i < 10)
        setTimeout("apear()", 100);
    else
        book_i = 0;
}

let bookbtn = document.getElementById('book-btn');

bookbtn.addEventListener('click', (event) => {
    if(bookbtn_status == 0){
        $("#book-pic").attr('src', 'prolog-x/image/book-next.png');
    }
    if (book_i == 0) {
        bookbtn_status++;
        if (bookbtn_status > 3)
            bookbtn_status -= 3;
        apear();
        var text = document.getElementById("intro-text");
        if (bookbtn_status == 1) {
            text.style.visibility = "visible";
            text.innerHTML = "1999年他在這個世界醒來<br>沒有幾個人知道他的存在<br>於是他跟著愛麗絲夢遊她的魔幻世界<br>與仙杜瑞拉在南瓜馬車上分享彼此的夢想<br>慫恿愛穿新衣的國王穿上他特製的那套禮服<br>在成為國家級臥底之前<br>他在一千零一個童話裡闖蕩<br>也可以說那一千零一個童話<br>是因他而寫因他而生因他而在";
        } else if (bookbtn_status == 2) {
            text.innerHTML = "愛麗絲是他交到的第一個朋友<br>她曾告訴過他<br>時間是很重要的<br>於是他答應了穿著新衣的國王的徵召<br>成為皇家御用臥底<br>也在接受嚴苛訓練的同時<br>寫下第一千零二個故事<br>這次<br>他是主角<br>代號：紅心皇后";

        } else if (bookbtn_status == 3) {
            text.innerHTML = "撲克牌有四種花色<br>在皇家駭客組織的系統裡<br>他們能代表著一個人的過去將來<br>紅心 梅花 黑桃 方塊<br>伸出手抽兩張牌<br>你的過去與將來<br>會怎麼寫？";
        }
    }
})

//cloth-size
$(function() {
    var x = 15;
    var y = 10;
    $("#cloth-size-btn").mouseover(function(e) { //當滑鼠指針從元素上移入時 
        var cloth_size_pic = "<img src='prolog-x/image/cloth-size.jpg' id='cloth-size-pic'>";
        $("body").append(cloth_size_pic);
        $("#cloth-size-pic").css({ "top": (e.pageY + y) + "px", "left": (5) + "vw" }).show("fast");
    }).mouseout(function() { //當滑鼠指針從元素上移開時 
        $("#cloth-size-pic").remove();
    }).mousemove(function(e) { //當滑鼠指針從元素上移動時 
        $("#cloth-size-pic").css({ "top": (e.pageY + y) + "px", "left": (5) + "vw" });
    });
});

//game-help
let game_help = document.getElementById('game-help');
let help = false;
game_help.addEventListener('click', (event) => {
        if(!help){
            $('#game-help-text').css('display','block');
            $('#enchant-stage').css('display','none');
            help = !help;
        }
        else{
            $('#game-help-text').css('display','none');
            $('#enchant-stage').css('display','block');
            help = !help;
        }
    
})

//bar
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

