window.onload =  function(){
    $(".loading").addClass("hide");
}

$(document).ready(function () {

    $(".nav-item").each( function(key, value){
        // this.style = "--index: " + key;
        this.setAttribute("style", "--index: " + key + ";");
    });

    $(".toggle-menu").click(function () { 
        $(".overlay").toggleClass("active");
        $(this).toggleClass("active");
    });
    // Slick slider
    $(".slider-items").slick({
        prevArrow: $(".prev-button"),
        nextArrow: $(".next-button"),
        autoplay: true,
        infinite: false
    });
    $(".product_slide").each(function(){
        $(this).slick({
            prevArrow: $(this).parent().find(".control-button.prev"),
            nextArrow: $(this).parent().find(".control-button.next"),
            autoplay: false,
            infinite: false,
            slidesToShow: 4,
            responsive:[
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    });
    $(".slider-banner-items").slick({
        prevArrow: $(".prev-slider .prev-button"),
        nextArrow: $(".next-slider .next-button"),
        autoplay: true,
        infinite: false,
        dots: true,
        customPaging: function(slider, i) {
            // this example would render "tabs" with titles
            return '<span class="dot"></span>';
        }
    });
    $(".blog-cotent-left_items").slick({
        prevArrow: $(".blog-title_control-left"),
        nextArrow: $(".blog-title_control-right"),
        autoplay: true
    });
    $(".logotypes").slick({
        slidesToShow: 4,
        prevArrow: $("#logotypes .prev-control"),
        nextArrow: $("#logotypes .next-control"),
        responsive:[
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $(".banner-footer-catelog").slick({
        dots: true,
        vertical: true,
        verticalSwiping: true,
        arrows: false,
        customPaging: function(slider, i) {
            // this example would render "tabs" with titles
            return '<span class="dot"></span>';
        },
        responsive:[
            {
                breakpoint: 900,
                settings: {
                    dots: false
                }
            }
        ]
    });
    // Menu Dropdown
    $('.navbar-nav li:has(ul)').append('<div class="dropdown"><i class="fa fa-chevron-down"></i></div>');
    $(".dropdown").click(function () {
        if($(window).width() <= 900){
            $(this).parent().find("ul:first").slideToggle();    
        }
    });

    // Search Navbar
    $(".search i").click(function(){
        $(".search-overlay").toggleClass("active");
    });
    $(".close-search-box").click(function(){
        $(".search-overlay").toggleClass("active");
    });

    // Navbar fixed when scroll
    ($("html,body").scrollTop() > 0) ? $(".navbar").css("background","#3853d8") : $(".navbar").css("background","transparent");
    $(window).scroll(function () { 
        if($("html,body").scrollTop() > 0){
            $(".navbar").css("background","#3853d8");
        }
        else{
            $(".navbar").css("background","transparent");
        }
    });

    $(".tab-toggle").click(function(){
        if($(this).next().length > 0){
            $(this).next().slideToggle();
            $(this).find(".toggle-icon").toggleClass("active"); 
        }
    });
    $(".ui-slider-handle").draggable({
        axis: "x",
        containment: "parent"
    });
    $(".slider-range").slider({
        range: true,
        min: 0,
        max: 1000,
        step: 5,
        values: [0, 1000],
        slide: function(e,ui){
            $(".min-range").text("$" + ui.values[0]);
            $(".max-range").text("$" + ui.values[1]);
            $(".min-input").val(ui.values[0]);
            $(".max-input").val(ui.values[1]);
        }
    });
    // Size Clothes
    $(".size-clothes_content li").click(function(){
        $value = this.getAttribute("data-size");
        $(".size-filter").val($value);
        $(".size-clothes_content .active").removeClass("active");
        $(this).addClass("active");
    });
    $(".product-item_desc-descreption_size li").click(function(){
        $(this).parent().find("li.active").removeClass("active");
        // $(".product-item_desc-descreption_size li.active").removeClass("active");
        $(this).addClass("active");
    });
    // Grid Menu
    $(".grid-menu_grid").click(function(){
        $(".product-item-catelog").each(function(index, value){
            $(this).removeClass("list").addClass("grid");
        });
        $(".product-item_desc-form").css("width", "100%");
        $(".product-item_desc-descreption").css("display", "none");
        $(".btn-add-to-cart").css("opacity", "0");
        $(".btn-add-to-cart").css("visibility", "hidden");
    });
    $(".grid-menu_list").click(function(){
        $(".product-item-catelog").each(function(index, value){
            $(this).removeClass("grid").addClass("list");
        });
        $(".product-item_desc-form").css("width", "70%");
        $(".product-item_desc-form").css("padding-left", "20px");
        $(".product-item_desc-descreption").css("display", "block");
        $(".btn-add-to-cart").css("opacity", "1");
        $(".btn-add-to-cart").css("visibility", "visible");
    });

    $(".product__detail__img__option_select").click(function(e){
        $(".product__detail__img__option_select.active").removeClass("active");
        $(this).addClass("active");
        $image_new = $(this).find("img").attr("src");
        $data_slide = $(this).data("slide");
        $(".product__detail__img__main img").attr("src",$image_new);
        $(".product__detail__img__main").attr("data-slide",$data_slide);
    });

    $(".decs-quantity").click(function(){
        $old_value = $(this).parent().find("input").val();
        $new_value = parseFloat($old_value) - 1;
        ($new_value >= 1) ? $(this).parent().find("input").val($new_value) : $old_value;
    });
    $(".inc-quantity").click(function(){
        $old_value = $(this).parent().find("input").val();
        $new_value = parseFloat($old_value) + 1;
        $(this).parent().find("input").val($new_value);
    });


    $animating = false;

    var slideLeft_Right = function(element, vertical = false){
        if(vertical) return;

        if(!$animating){
            $animating = true;
            $y = $(".product__detail__img__option_selects").scrollTop();
            $x = $(".product__detail__img__option_selects").scrollLeft();
            $change_x = $(".product__detail__img__option_select").outerWidth();
            $change_y = $(".product__detail__img__option_select").outerHeight();
            if(element == "prev"){
                    $change_x = -$change_x;
                    $change_y = -$change_y;
            }
            if($(window).width() <= 900){
                $(".product__detail__img__option_selects").animate({scrollLeft: $x + $change_x}, 300, function(){ $animating = false});           
            }else{     
                $(".product__detail__img__option_selects").animate({scrollTop: $y + $change_y}, 300, function(){ $animating = false});      
            }            
        }        
    }

    $(".product__detail__img__control").click(function(){
        $button = $(this);
        if($button.hasClass("prev"))
            slideLeft_Right("prev");
        else
            slideLeft_Right("");
    });
    
    $(".product__detail__img__option_selects")
    .on('swipeleft', function(e){
        if($(window).width() <= 900)
            slideLeft_Right();
    })
    .on("swiperight", function(e){
        if($(window).width() <= 900)
            slideLeft_Right("prev");
    })
    .on("mousedown", function(e){
        e.preventDefault();
    });

    $(".product__detail__img__main").click(function(e){
        $image = $(this).find("img").attr("src");
        $data_slide = $(this).attr("data-slide");
        $(".overflow-image").find("img").attr("src", $image);
        $(".overflow-image__image").attr("data-slide", $data_slide);;
        $(".overflow-image").fadeIn();
    });
    $(".overflow-image__close").click(function(e){
        $(".overflow-image").fadeOut();
    });

    $(".overflow-image__control").click(function(){
        $data_slide = parseInt($(".overflow-image__image").attr("data-slide"));
        if($(this).hasClass("prev")){
            $data_slide = $data_slide - 1;
        }
        else{
            $data_slide = $data_slide + 1;
        }
        if($data_slide < 1 ) $data_slide = 1;
        else if($data_slide > $(".product__detail__img__option_select").length - 1 ) $data_slide = $(".product__detail__img__option_select").length;
        $image_new = $(".product__detail__img__option_select").eq($data_slide - 1).find("img").attr("src");
        $(".overflow-image__image").find("img").attr("src",$image_new);
        $(".overflow-image__image").attr("data-slide",$data_slide);
    });


    $("a[href='#review']").click(function(){
        $(".comment-form").slideDown();
    });
    $(".close-comment-form").click(function(){
        $(".comment-form").slideUp();
    });
    $(".review-title>div").click(function(){
        $(".review-title>div.active").removeClass("active");
        $(this).addClass("active");
    });
    $(".reiview__title").click(function(){
        $(".description-main").slideUp();
        $(".spec-main").slideUp();
        $(".review-main").slideDown();
        $(this).addClass("active");
    });

    $(".spec__title").click(function(){
        $(".description-main").slideUp();
        $(".review-main").slideUp();
        $(".spec-main").slideDown();
        $(this).addClass("active");
    });

    $(".description__title").click(function(){
        $(".description-main").slideDown();
        $(".review-main").slideUp();
        $(".spec-main").slideUp();
        $(this).addClass("active");
    });

    // Related Product

    // $(".product-related").slick({
    //     slidesToShow: 4,
    //     prevArrow: $(".control-button.prev"),
    //     nextArrow: $(".control-button.next"),
    //     infinite: false,
    //     responsive:[
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 1
    //             }
    //         },
    //         {
    //             breakpoint: 600,
    //             settings: {
    //                 slidesToShow: 2
    //             }
    //         }
    //     ]
    // });


    // Ajax
    $(".size_select").each(function(){
        $color_select = $(this).parent().next().find(".color_select");
        $size_id = $(this).val();
        $product_id = $(this).attr("data-product");

        $.ajax({
            type: "GET",
            url: "ajax/get_color.php",
            async: false,
            data: {
                id_size: $size_id,
                id_product: $product_id
            }
        }).done(function(response){
            $color_select.html(response);
            console.log($color_select.attr("data-product"));
        });       
    });
        

    $(".size_select").change(function(){
        $color_select = $(this).parent().next().find(".color_select");
        $size_id = $(this).val();
        $product_id = $(this).attr("data-product");

        $.ajax({
            type: "GET",
            url: "ajax/get_color.php",
            data: {
                id_size: $size_id,
                id_product: $product_id
            },
            success: function (response) {
                $color_select.html(response);
            }
        });
    });
});