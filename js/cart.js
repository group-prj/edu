showTable();

function showTable() {
                var mycart = localStorage.getItem('mycart');
                if (mycart) {
                    var mycartobj = JSON.parse(mycart);
                    var html = '';
                    var j = 1;
                    var total = 0;
                    $.each(mycartobj.cart, function (i, v) {
                        if (v) {
                            var id = v.id;
                            var name = v.name;
                            var price = v.price;
                            var quantity = v.quantity;
                            var photo = v.photo;
                            var subtotal = quantity * price;
                            total += parseInt(subtotal);
                            html = html + '<tr><td>' + j + '</td><td>' + name + '</td><td><img src="' + photo +
                                '" width=100 height=100 border=1></td><td>' + price + '</td><td>' + quantity + '</td><td>' + subtotal +
                                '</td><tr>';
                            j++;
                        }
                    })
                    html = html + '<tr><td colspan="5">Total</td><td colspan="2" id="totalamount">' + total + '</td></tr>';


                    $("tbody").html(html);
                }
            }
$('.addToCart').click(function()
                {
                    //alert("hi");
                    var id = $(this).data('id');
                var name = $(this).data('name');
                var price = $(this).data('price');
                var photo = $(this).data('photo');
                alert(id+name+price+photo);
                   var book = {
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1,
                    photo: photo
                }
                var mycart = localStorage.getItem('mycart');
                if (!mycart) {
                    mycart = '{"cart":[]}';
                }
                var mycartobj = JSON.parse(mycart);
                var hasid = false;
                var index = '';
                var noti=0;
                $.each(mycartobj.cart, function (i, v) {
                    if (v) {
                        if (id == v.id) {
                            hasid = true;
                            index = i;
                        }
                    }
                })
                if (!hasid) {
                    mycartobj.cart.push(book);
                } else {
                    mycartobj.cart[index].quantity++;
                }

                localStorage.setItem('mycart', JSON.stringify(mycartobj));
                console.log(mycartobj);
                showTable();
                })


$('.order').click(function(){
    var total=$('#totalamount').html();
    var order=confirm('Are u sure to order?Your amount is'+total);
    if(order==true)
    {
        var mystoreditem=localStorage.getItem('mycart');
        if(mystoreditem)
        {
            var mystoreditem=JSON.parse(mystoreditem);
            var cart=mystoreditem.cart;
            var mycartstring=JSON.stringify(cart);
            $.ajax({
                method:'post',
                url:'order.php',
                data:{cart:mycartstring},
                success:function(response){
                    alert(response);
                    if(response=='success')
                    {
                        localStorage.clear();
                        alert('YOur Order successfully completed');
                        showTable();

                    }
                }
            })
        }
    }
})