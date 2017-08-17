/**
 * 　アコーディオン
 */
$(function(){
    $('.accordion').on('click', 'li', function(){
	var $this = $(this);
	//コンテンツを開く
	$this
	.toggleClass('expanded')
	.children('.content')
	.slideToggle('fast')
	.end()
	.siblings()
	.removeClass('expanded')
	.children('.content')
	.slideUp('fast');
	});
});

/**
 * 　ドロップダウンメニュー
 */
$(function(){
    $('.dropdown-menu').children('a')
    .on('click', function(event){
	event.preventDefault();
	event.stopPropagation();
	var $this = $(this);

	function closeItems() {
	    $this.removeClass('open')
	    .next().hide();
	    }

	$this.parent().siblings('li')
	.each(function(){
	    $(this).children('a')
	    .removeClass('open')
	    .next().hide();
	    });

	if($this.hasClass('open')) {
	    $this.removeClass('open')
	    .next().hide();
	    $('html').off('click', closeItems);
	    } else {
		$this.addClass('open')
		.next().show();
		$('html').on('click', closeItems);
		}
	});
});



/**
 *  スライドショー
 */
$(function(){
    var intervalId;
    setTimer();

    function setTimer(){
	intervalId = setInterval(autoClick, 4000);
	}

    function autoClick(){
	 $('.slide').children('a.next').click();
	}

    function changeImage($click){
	var $current;
	var findSelector = '';
	var $new;

	$current = $click.siblings('.container').children('.current');

	if($click.hasClass('next')){
	    $new = $current.next();
	    findSelector = ':first-child';
	    } else {
		$new = $current.prev();
		findSelector = ':last-child';
		}

	if($new.length == 0) {
	    $new = $current.siblings(findSelector);
	    }
	$current.removeClass('current');
	$new.addClass('current');
	setTimer();
	}

    $('.slide')
    .on('click', '> a', function(event){
	event.preventDefault();
	event.stopPropagation();
	clearInterval(intervalId);
	changeImage($(this));
    });
});

/**
 * 　スクロールしてページ内のリンク先まで移動する
 * 　スクロールしてページトップに戻る
 */
$(function(){
    $('a.scroll-link').on('click', function(event){
	var $this = $(this);
	var linkTo = $this.attr('href');
	var $target;
	var offset = 0;
	var pos = 0;
	if(linkTo != '#top'){
	    $target = $(linkTo);
	    offset = $target.data('offsettop');
	    pos = $target.offset().top - offset;
	    }
	$('html,body').animate({scrollTop: pos}, 400);
	});
});

/**
 * 　スクロール位置に合わせてリンクをハイライトする
 */
$(function(){
    $(window).on('scroll', function(){
	$('a.scroll-track').each(function(){
	    var $window = $(window);
	    var $this = $(this);
	    var linkTo = $this.attr('href');
	    var $target = $(linkTo);
	    var offset = $target.data('offsettop') || 0;
	    var tolerance = 1;
	    var topLimit = $target.offset().top - offset - tolerance;
	    var bottomLimit = $target.offset().top + $target.outerHeight() - offset + tolerance;

	    if(topLimit <= $window.scrollTop() && $window.scrollTop() <= bottomLimit){
		$this.addClass('selected');
		} else {
		    $this.removeClass('selected');
		    }
	    });
	});
});

/*
* 8/11追記
* スクロールして画像がある位置までスクロールしたら写真が出てくるようにする.
*/

$(function(){
    var setElm = $('.scrollEvent'),
    delayHeight = 500;

    setElm.css({display:'block',opacity:'0'});
    $('html,body').animate({scrollTop:0},1);

    $(window).on('load scroll resize',function(){
        setElm.each(function(){
            var setThis = $(this),
            elmTop = setThis.offset().top,
            elmHeight = setThis.height(),
            scrolltop = $(window).scrollTop(),
            windowHeight = $(window).height();
	    //上からスクロールしたときのイベント処理
            if (scrolltop > elmTop - windowHeight + delayHeight && scrolltop < elmTop + elmHeight){
                setThis.stop().animate({left:'0',opacity:'1'},500);
            }
        });
    });
});
