$(function() {
    // TEST--------------------------------------------
    
    $('#slider').fadeIn(300);
    
    // TEST--------------------------------------------
 $('#slider').slick({
    slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  fade: true,
  arrows:false,
  autoplaySpeed: 3000,
  dots:true,
  pauseOnFocus:false
});


    $('#login_btn').mouseover(function(){
        $('.top-login-wrapper').css("display","inline-block");
    });

    $('.top-login-wrapper').mouseleave(function(){
        $(this).css("display","none");
    })  


    $("#reviewBtn").click(function(){
        if($(".write_review").css('display') == 'none'){
        // if($(".write_review").css('display','none')){
            $('.write_review').slideDown(1000);
            $("#reviewBtn").text('Close the window');
        }else{
            $('.write_review').slideUp(1000);
            $("#reviewBtn").text('Write a review');
        }
    });

    $( '#c_pay_type1' ).change( function() {  
        $('.credit_pattern_2').hide();
        $('.credit_pattern_3').hide();
        $('.credit_pattern_1').show();
        });

    $( '#c_pay_type2' ).change( function() {
        $('#paypalBtn').show();
        $('.credit_pattern_1').hide();
        $('.credit_pattern_3').hide();
        $('.credit_pattern_2').show();
        });

    $( '#c_pay_type3' ).change( function() {  
        $('.credit_pattern_1').hide();
        $('.credit_pattern_2').hide();
        $('.credit_pattern_3').show();
        });

        $('#paypalBtn').on('click',function(){
            $('#paypalBtn').hide();
            $('#confirm').show();
        })

        $('a[href^="#"]').click(function(){
                    var speed = 500;
                    var href= $(this).attr("href");
                    var target = $(href == "#" || href == "" ? 'html' : href);
                    var position = target.offset().top;
                    $("html, body").animate({scrollTop:position}, speed, "swing");
                    return false;
                });


//ページネーション-------------------------




  
});

//サムネイルチェンジイベント-----------------
function changeimg(url,e) {
    document.getElementById("img").src = url;
    var nodes = document.getElementById("thumb_img");
    var img_child = nodes.children; //id名「thumb_img」配下の子要素を取得
    for (i = 0; i < img_child.length; i++) { //要素の数ループさせる
        img_child[i].classList.remove('active') //要素に付与されているすべてのclass名「active」を削除する
    }
    e.classList.add('active'); //クリック（タップ）した要素にclass名「active」を付与する
    }