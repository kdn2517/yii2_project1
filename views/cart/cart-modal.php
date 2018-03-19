<?php if(!empty($session['cart'])): ?>
<div class="wrap">
    <table class="table table-inverse">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Количество</th>
            <th></th>
            <th></th>
            <th>Цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item): ?>
        <?php if($item['number'] == 0) {
            continue;
        } ?>
        <tr>
            <td><?=$item['name']?></td>
            <td><?=$item['number']?></td>
            <td class="plus" dataContentId="<?=$id;?>">+</td>
            <td class="minus" dataContentId="<?=$id;?>">-</td>
            <td><?=$item['price'] * $item['number']?></td>
            <td class="clean" dataContentId="<?=$id;?>">X</td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>Всего товаров</td>
            <td><?=$session['cart-number']?></td>
        </tr>
        <tr>
            <td>Общая стоимость</td>
            <td><?= $session['cart-amount'] ?></td>
        </tr>
        </tbody>
    </table>
    <a href="/cart/buy" class="btn btn-primary">Оформить</a>
</div>
<?php else: ?>
<h3>Корзина пуста</h3>
<?php endif; ?>

<script>
$(document).ready(function ()
{
    
        $(".minus").off("click");
        $(".minus").on("click", function (e) {
var productId = $(this).attr('dataContentId');
        $.ajax({
        url: "/cart/minus",
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

$(document).ready(function ()
{
    
        $(".clean").off("click");
        $(".clean").on("click", function (e) {
var productId = $(this).attr('dataContentId');
        $.ajax({
        url: "/cart/clean",
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

$(document).ready(function ()
{
        $(".plus").off("click");
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
</script>


