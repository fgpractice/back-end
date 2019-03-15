$(document).ready(function(){	
	//передача id товара в данные выпадающего меню price
    $('.insert_order').click(function () { 

        var id_product = $(this).val();
        // alert(id_product);
        // передать product_id
        $.ajax({
            type: 'POST',
            url: 'modal',
            data: ({
                id_product : id_product
            }),
            dataType: 'html',
            success: function (result) {
                // alert(result);
                //$('.insertModal').empty().append(result);
                document.getElementById("insertValue").innerHTML=result;
            }
        })
        
    })
 
    // $('.rachet').click(function () { 

    //     var total_count = document.getElementById("insertTotal_count").value;
    //     alert(total_count);
    //     // передать product_id
    //     // $.ajax({
    //     //     type: 'POST',
    //     //     url: 'podchet',
    //     //     data: ({
    //     //         total_count : total_count
    //     //     }),
    //     //     dataType: 'html',
    //     //     success: function (result) {
    //     //         alert(result);
    //     //         $('.insertModal').empty().append(result);
    //     //         document.getElementById("insertTotal_count").innerHTML=result;
    //     //     }
    //     // })
    // })
});

    // расчет суммы
    function rachet_sum(){
        var n = document.getElementById("insertId_price").options.selectedIndex;
        var price = document.getElementById('insertId_price').options[n].text;
        var total_count = document.getElementById('insertTotal_count').value;
        var total_amount = price * total_count;
        document.getElementById('insertTotal_amount').value = total_amount;
        total_amount_a = document.getElementById('insertTotal_amount').value;
        alert(total_amount_a);
	}

