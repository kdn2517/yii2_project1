$(document).ready(function ()
{
        $(".plus").on("click", function (e) {
var productId = $(this).attr('dataContentId');
        $.ajax({
            url: "/cart/add",
            type: "GET",
            data: ({productId: productId}),
        beforeSend: function()
            {

            },
        success: function(data)
            {
                $('#cart1 .modal-body').html(data);
                $('#cart').html(data);
                $('#cart1').modal();
            },
        error: function funcError()
            {
                alert('Ошибка!');
            }
        });
    });
});


$(document).ready(function()
{
        var data = {};
    $('#form3').submit(function(e)
    {
                e.preventDefault();
                productId = $("input[name='productId']").val();
                number = $("select").val();
                $.ajax({
                url: "/cart/add",
                        type: "GET",
                        data: ({productId: productId, number: number}),
        beforeSend: function()
            {

            },
        success: function(data)
            {
                $('#cart1 .modal-body').html(data);
                $('#cart').html(data);
                $('#cart1').modal();
            },
        error: function funcError()
            {
                alert('Ошибка!');
            }
        });
    });
});



