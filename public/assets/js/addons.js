$(document).ready(function () {

    // $('#Add-To-Cart').on('click', function (e) {
    //     e.preventDefault();
    //     console.log('buttoj clivk');
    //     $.ajax({
    //         type: "POST",
    //         url: "add-to-cart",
    //         data: "data",
    //         dataType: "dataType",
    //         success: function (response) {

    //         }
    //     });
    // });
    // $("#Add-To-Cart").on('submit',function (e) {
    //     e.preventDefault();
    //     let user_id = $('#user_id').val();
    //     let prod_id = $('#prod_id').val();
    //     let prod_qty = $('#prod_qty').val();
    //     let ProdDatas = {
    //         user_id,
    //         prod_id,
    //         prod_qty
    //     }
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         method: "POST",
    //         url:'add-to-cart/'.prod_id,
    //         data: ProdDatas,
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // });

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
});
