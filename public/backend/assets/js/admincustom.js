$(function () {
    //Add Product

    $("#addProduct").on("submit", function (e) {
        e.preventDefault();
        console.log("Add Button Click");
        let title = $("#title").val();
        let category_id = $("#category_id").val();
        let user_id = $("#user_id").val();
        let desc = $("#desc").val();
        let selling_price = $("#selling_price").val();
        let discount_price = $("#discount_price").val();
        let prod_qty = $("#prod_qty").val();
        let status = $("#status").val();
        let slug = $("#slug").val();
        let image = $("#image").val();
        let prodDatas = {
            title,
            category_id,
            user_id,
            selling_price,
            discount_price,
            prod_qty,
            desc,
            status,
            slug,
            image,
        };
        console.log(prodDatas);

        if (
            title === "" ||
            category_id === "" ||
            desc === "" ||
            discount_price === "" ||
            prod_qty === "" ||
            desc === "" ||
            status === "" ||
            slug === "" ||
            image === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Required Fields can not be empty",
                text: "Please enter your username or password",
                showConfirmButton: true,
                timer: 5000,
            });
        } else {
            let prodDatas = {
                title,
                category_id,
                user_id,
                selling_price,
                discount_price,
                prod_qty,
                desc,
                status,
                slug,
                image,
            };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/add-product",
                data: prodDatas,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: response.status,
                        title: response.status,
                        text: response.message,
                    }).then((result) => {
                        if (response.status == "success") {
                            window.location = response.url;
                        } else {
                            return false;
                        }
                    });
                },
            });
        }
    });

    $("#editProduct").on("submit", function (e) {
        e.preventDefault();

        let prodID = $("#prodID").val();
        let name = $("#name").val();
        let brand_id = $("#brand_id").val();
        let short_desc = $("#small_desc").val();
        let selling_price = $("#selling_price").val();
        let discount_price = $("#discount_price").val();
        let qty = $("#qty").val();
        let desc = $("#desc").val();
        let status = $("#status").val();
        let slug = $("#slug").val();
        let image = $("#image").val();
        console.log(prodID);

        if (
            name === "" ||
            brand_id === "" ||
            short_desc === "" ||
            discount_price === "" ||
            qty === "" ||
            desc === "" ||
            status === "" ||
            slug === "" ||
            image === ""
        ) {
            Swal.fire({
                icon: "error",
                title: "Required Fields can not be empty",
                text: "Please enter your username or password",
                showConfirmButton: true,
                timer: 5000,
            });
        } else {
            let prodDatas = {
                name,
                brand_id,
                short_desc,
                selling_price,
                discount_price,
                qty,
                desc,
                status,
                slug,
                image,
            };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                type: "POST",
                url: "/edit-product/".prodID,
                data: prodDatas,
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                        icon: response.status,
                        title: response.status,
                        text: response.message,
                    }).then((result) => {
                        if (response.status == "success") {
                            console.log(response.url);
                            window.location = response.url;
                        } else {
                            return false;
                        }
                    });
                },
            });
        }
    });

    //Delete button

    $("#deleteBtn").on("click", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Delete a Product",
            text: "Are you sure, You want to delete it ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#30865d",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete Now!",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("confirmed");
                $.ajax({
                    type: "get",
                    url: "delete-product/".prodID,
                    success: function (response) {
                        // console.log(response);
                        setInterval(() => {
                            window.location = response.url;
                        }, 500);
                        // $("#login-btn").removeAttr("disabled", true).text("Submit");
                    },
                });
            }
        });
    });
});
