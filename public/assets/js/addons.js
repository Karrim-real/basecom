
$(document).ready(function () {
    loadCount()

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
        $.ajax({
            type: "GET",
            url: "/load-nav-prods",
            success: function (response) {

            }
        });
    }

    $('#paymentForm').on('submit', function (e) {
        e.preventDefault();
        $('#buynow').addClass('disabled')
        let email = $('#email').val();
        let amount = $('#amounts').val();
        let amounInt = parseInt(amount);
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
              console.log('You have cance the payment process');
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
    });
});
