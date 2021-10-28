$(document).ready(function () {
    $category = $(".ajax_category");
    $.ajax({
        type: "GET",
        url: "ajax/ajax_category.php",
        success: function(response){
            $category.html(response);  
        }
    });
    $(".ajax_category").change(function(){
        $value = $(this).val();
        $obj = $(".ajax_product");
        $.ajax({
            type: "GET",
            url: "ajax/ajax_product.php",
            data: "id=" + $value,
            success: function(response){
                $obj.html(response);
            }
        });
    });

});