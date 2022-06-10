
$(document).ready(function () {
    loadCount()
    loadNavProds()

    $("#addProduct").on("submit", function (e) {
        e.preventDefault();

        const user_id = $('#user_id').val();
        const prod_id = $('#prod_id').val();
        const prod_qty = $('#prod_qty').val();

        const ProdDatas = {
            user_id,
            prod_id,
            prod_qty
        }
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: ProdDatas,
                dataType: "json",
                success: function (response) {
                // console.log(response);
                Swal.fire({
                    icon: response.status,
                    title: response.status,
                    text: response.message,
                })
                },
            });

    });

    //Count Cart
    function loadCount(){
        $.ajax({
            type: "GET",
            url: "load-count",
            success: function (response) {
                // alert(response.cartcount);
                $('.cart_quantity').html('0');
                $('.cart_quantity').html(response.cartcount);

            }
        });
    }

    function loadNavProds(){
        $('#prodname').html('loading');
        // console.log(link);

        $.ajax({
            type: "GET",
            url: "load-nav-prods",
            dataType: 'json',
            success: function (response) {
                $('#prodname').html(response.cartprods.title);
                $('#prodprice').html(response.cartprods.discount_price);
                $('#prodimage').attr('src','assets/img/shopping-bag.png');
                $('#prodlink').attr('href','product/'+response.cartprods.id+'/'+response.cartprods.slug);
                $('#prodqty').html(response.prod_qty);

                // console.log(response.prod_qty);
            }
        });
    }


    $('#paymentForm').on('submit', function (e) {
        e.preventDefault();
        let pay = $("input[name='payoption']:checked").val();

        console.log(pay);
        $('#buynow').addClass('disabled')
        let name = $('#name').val();
        let email = $('#email').val();
        let amount = $('#amounts').val();
        let amounInt = parseInt(amount);
        if(pay === 'paystack'){

        let ref = 'paystack'+Math.floor((Math.random() * 10000000000) + 1);

        // console.log(amounInt, email, ref);
        let handler = PaystackPop.setup({
            key: 'pk_test_aad75fe1267330f1c4c3355581891fdf246f4060', // Replace with your public key
            email: email,
            amount: amounInt * 100,
            ref: ref, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
              alert('Window closed.');
              console.log('You have cancel the payment process');
            },
            callback: function(response){
                let referenceid = response.reference;
            $.ajax({
                type: "GET",
                url: "order-payment/"+referenceid,
                // data: referenceid,
                dataType: 'json',
                success: function (responsei) {
                    console.log(responsei);
                    if(responsei.status === 'success'){
                        Swal.fire({
                            icon: responsei.status,
                            title: responsei.status,
                            text: responsei.message,
                            showConfirmButton: true,
                            timer: 2000,
                        }).then(result=>{
                            window.location = responsei.url
                        })
                    }
                }
            });

            }
          });
          handler.openIframe();
        }else{
            // console.log('btc choose');
        let ref = 'lazerpay'+Math.floor((Math.random() * 10000000000) + 1);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        $.ajax({
            type: "POST",
            url: "/payment",
            // data: referenceid,
            dataType: 'json',
            success: function (responsel) {
                console.log(responsel.data);
                // if(responsei.status === 'success'){
                //     Swal.fire({
                //         icon: responsei.status,
                //         title: responsei.status,
                //         text: responsei.message,
                //         showConfirmButton: true,
                //         timer: 2000,
                //     }).then(result=>{
                //         window.location = responsei.url
                //     })
                // }
            }
        });
            // LazerCheckout({
            //     reference: ref,
            //     name: name,
            //     email: email,
            //     amount: amounInt,
            //     key: "pk_test_y48NtxNZiHPvA4rST60Km5huvIKnrDy4m0Jy3HbxpS7dOta29U",
            //     currency: "USD",
            //     coin: 'USDT',
            //     acceptPartialPayment: false, // By default it's false
            //     onClose: (data)=>{
            //         alert('Payment Cancel');
            //         console.log('You have cancel your payment');
            //     },
            //     onSuccess: (data)=>{
            //         console.log('Payment was made successfull');
            //     },
            //     onError: (data)=>{
            //         console.log('An Error Occur while initialize your payment');

            //     }
            //  })
        }
    });
});
