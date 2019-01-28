$(function() {
    $('#input_fields_wrap').on('change', '[id^=code]', (function (e) {
        let id = e.target.id.slice(4);
        console.log($('#code'+id).val());
        $.ajax({
            type: 'POST',
            url: 'order/getBillingData.php',
            data: {code: $('#code'+id).val()},
            success: function (data) {
                // console.log(data);
                $('#price'+id).val(data['price']);
                $('#selling_price'+id).val(data['price']);
                let color = data['sizes'];
                $('#color_size'+id)
                    .find('option')
                    .remove();
                // console.log(color);
                $('#color_size'+id).append($('<option>', {
                    value: 0,
                    text: "----"
                }));
                for (i = 0; i < color.length; i++) {

                    $('#color_size'+id).append($('<option>', {
                        value: color[i][2],
                        text: color[i][0] + " | " + color[i][1]
                    }));
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown)
            }
        })
    }));

    $('#input_fields_wrap').on('change', '[id^=color_size]', (function (e) {
        let id = e.target.id.slice(10);
        let id2 = $("#color_size" + id + " option:selected").val();
        $.ajax({
            type:"POST",
            url: "order/getMaxQty.php",
            data: {id: id2},
            success: function (data) {
                // console.log(data[]);
                $("#qty"+id).attr({
                    "max":data['quantity']
                })
            }
        })
    }));

    $('#input_fields_wrap').on('change', '[id^=qty]', (function (e)
    {
        var id = e.target.id.slice(3);
        var value = e.target.value;

        console.log(value);
        var max = parseInt($(this).attr('max'));
        var min = parseInt($(this).attr('min'));

        if ($(this).val() > max)
        {
            // $(this).val(max);
            // console.log('exce    eded');
            // $(this).parentNode.addClass('has-warning');
            // console.log($('#qty'+id).parent())
            $(this.parentNode.parentNode).addClass('has-error');
            $(this.parentNode.parentNode).removeClass('has-success');
        }
        else
        {
            $(this.parentNode.parentNode).removeClass('has-error');
            $(this.parentNode.parentNode).addClass('has-success');
            console.log("success");
        }
    }));

    // $('#').on('change','[id = ]')
    // $('#')

});

