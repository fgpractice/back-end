$(document).ready(function(){	
	
    $('.insert_order').click(function () {   

        var product_id = $(this).val();
        // alert(id_product);
        // передать product_id
        $.ajax({
            type: 'POST',
            url: 'orders/create',
            data: ({
                product_id : product_id
            }),
            dataType: 'html',
            success: function (result) {
                // alert(result);
                $('.insertModal').empty().append(result);
            }
        })

    })

    // $('#insertModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var value = button.data('value') // Extract info from data-* attributes
    //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //     var modal = $(this)
    //     modal.find('#id_product').val(value)
    //   })
});