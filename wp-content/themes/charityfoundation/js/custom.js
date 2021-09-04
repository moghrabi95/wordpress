(function ($) {

    var cartBtn = $('.add_to_cart_js');

    var cartSystem = {
        init: function () {
            cartSystem.control();
            cartSystem.checkLocalStorage();
            cartSystem.enableDonatebtn();
            cartSystem.cartUpdate();
            cartSystem.checkoutUpdat();
        },
        control: function () {
            cartBtn.each(function (index, el) {
                $(this).on('click', function () {
                    var projectId = $(this).siblings('#project-id').val();
                    var projectName = $(this).siblings('#project-name').val();
                    var projectPrice = $(this).siblings('#project-price').val();
                    var subscriptionValue = $(this).siblings('#subscription').val();

                    if (projectPrice != "") {
                        $(this).append("<div class=\"loader\"></div>");
                        productInfo =
                            {
                                "ID": projectId,
                                "name": projectName,
                                "price": projectPrice,
                                "inCart": 0,
                                "subscription":subscriptionValue
                            };
                        cartSystem.totalCart(productInfo.price);
                        setTimeout(function () {
                            $(".loader").remove();
                        }, 1000);
                        cartSystem.addtocart(productInfo);
                        cartSystem.updatCartIcon()
                        $(this).siblings('#project-price').removeClass("warning-btn")
                    } else {
                        $(this).siblings('#project-price').addClass("warning-btn")
                        $(this).siblings('#project-price').focus();
                    }

                })
            })
        },
        enableDonatebtn: function () {
            var projectId = $('#project-id');
            projectId.each(function () {
                $(this).on("input", function () {
                    $(this).siblings('.add_to_cart_js').attr("");
                })
            })
        },
        addtocart: function (products) {
            cartSystem.setItems(products);

        },
        setItems: function (product) {
            let cartItems = localStorage.getItem("projectsInCart");
            cartItems = JSON.parse(cartItems);
            if (cartItems != null) {
                if (cartItems[product.name] == undefined) {
                    cartItems = {...cartItems, [product.name]: product}
                }
                cartItems[product.name].inCart += 1;
            } else {
                product.inCart = 1;
                cartItems = {
                    [product.name]: product
                }
            }

            console.log(cartItems);
            localStorage.setItem("projectsInCart", JSON.stringify(cartItems));


        },
        updatCartIcon: function () {
            let cartIconFixed = $(".cart-fixed #lblCartCount");
            let cartIcon = $("#lblCartCount");
            let numberOfOrder = localStorage.getItem("numberOfOrder");
            numberOfOrder = parseInt(numberOfOrder);
            if (numberOfOrder) {
                localStorage.setItem("numberOfOrder", numberOfOrder + 1);
                cartIcon.html(numberOfOrder + 1);
                cartIconFixed.html(numberOfOrder + 1);
            } else {
                $("body").append("<div class=\"cart-section cart-fixed\">\n" +
                    "<a href='http://localhost/cart/'>" +
                    "<img class=\"cart-img \" width=\"20\" src=\"http://localhost/wp-content/plugins/nd-shortcodes/addons/customizer/header/header-3/../img/shopping-cart.svg\">\n" +
                    "<span class=\"badge badge-warning\" id=\"lblCartCount\" style=\"display: inline;\">" + 1 + "</span>\n" +
                    "</a> </div>");
                localStorage.setItem("numberOfOrder", 1);
                cartIcon.html(1);
                cartIcon.css("display", "inline");
            }


        },
        checkLocalStorage: function () {
            let cartIcon = $("#lblCartCount");
            let numberOfOrder = localStorage.getItem("numberOfOrder");
            numberOfOrder = parseInt(numberOfOrder);
            if (numberOfOrder) {
                $("body").append("<div class=\"cart-section cart-fixed\">\n" +
                    "<a href='http://localhost/cart/'>" +
                    "<img class=\"cart-img \" width=\"20\" src=\"http://localhost/wp-content/plugins/nd-shortcodes/addons/customizer/header/header-3/../img/shopping-cart.svg\">\n" +
                    "<span class=\"badge badge-warning\" id=\"lblCartCount\" style=\"display: inline;\">" + numberOfOrder + "</span>\n" +
                    "</a></div>");
                cartIcon.css("display", "inline");
                cartIcon.html(numberOfOrder);
            }
        },
        totalCart: function (price) {
            let cartCost = localStorage.getItem("toltalCost");
            price = parseInt(price);
            console.log(typeof price);
            if (cartCost != null) {
                cartCost = parseInt(cartCost);
                localStorage.setItem("toltalCost", cartCost + parseInt(price));
            } else {
                localStorage.setItem("toltalCost", price);
            }

        },
        cartUpdate: function (){
            let projectsInCart = JSON.parse(localStorage.getItem("projectsInCart"));
            let toltalCost = localStorage.getItem("toltalCost");
            let cartPage = $(".woocommerce-custom");
            if (projectsInCart && cartPage.length > 0 ){
                Object.values(projectsInCart).map(item => {
                    cartPage.find("tbody.main-table").append("<tr class=\"woocommerce-cart-form__cart-item cart_item\">\n" +
                        "                       <td class=\"product-remove\">\n" +
                        "                          <span class=\"remove\" aria-label=\"Remove this item\" data-product_id=\"805\" data-product_sku=\"product-02\">×</span>\n" +
                        "                       </td>\n" +
                        "                       <td class=\"product-name\" data-title=\"Product\">\n" +
                        "                          <a href=\"http://localhost/product/orca-project/\">"+item.name+"</a>\n" +
                        "                       </td>\n" +
                        "                       <td class=\"product-price\" data-title=\"Price\">\n" +
                        "                          <span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">£</span>" +item.price + "</span>\n" +
                        "                       </td>\n" +
                        "                       <td class=\"product-quantity\" data-title=\"Quantity\">\n" +
                        "                          <div class=\"quantity\">\n" +
                        "                             <input disabled type=\"number\" class=\"input-text qty text\" step=\"1\" min=\"0\" max=\"\" name=\"cart[846c260d715e5b854ffad5f70a516c88][qty]\" value=\""+ parseInt(item.inCart) + "\" title=\"Qty\" size=\"4\" pattern=\"[0-9]*\" inputmode=\"numeric\">\n" +
                        "                          </div>\n" +
                        "                       </td>\n" +
                        "                       <td class=\"product-subtotal\" data-title=\"Total\">\n" +
                        "                          <span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">£</span>" + parseInt(item.price) * parseInt(item.inCart) + "</span>\n" +
                        "                       </td>\n" +
                        "                    </tr>" + " <tr>\n" +
                        "                       <td colspan=\"6\" class=\"actions\">\n" +
                        "                         </td>\n" +
                        "                    </tr>");
                });
                cartPage.find(".total-cart").append("<tr class=\"cart-subtotal\">\n" +
                    "                          <th>Subtotal</th>\n" +
                    "                          <td data-title=\"Subtotal\"><span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">£</span>"+toltalCost+"</span></td>\n" +
                    "                       </tr>\n" +
                    "                       <tr class=\"order-total\">\n" +
                    "                          <th>Total</th>\n" +
                    "                          <td data-title=\"Total\"><strong><span class=\"woocommerce-Price-amount amount\"><span class=\"woocommerce-Price-currencySymbol\">£</span>"+toltalCost+"</span></strong> </td>\n" +
                    "                       </tr>")

                cartPage.find(".product-remove").on("click", function (){
                    let newItems = [];
                    let xPrice =0;
                    let project= $(this).siblings(".product-name").children("a").html();
                    let numofOrder = localStorage.getItem("numberOfOrder");
                    let quantityOfProduct = $(".woocommerce-custom .quantity input").val();
                    Object.values(projectsInCart).map(x => {
                        console.log(x);
                        if (x.name != project){
                            let newobj = x;
                            newobj = {...newobj, [x.name]:x}
                            newItems.push(newobj);

                        }else {
                            xPrice = x.price * x.inCart;
                        }

                    })
                    localStorage.setItem("numberOfOrder", numofOrder - quantityOfProduct  );
                    localStorage.setItem("projectsInCart", JSON.stringify(newItems));
                    localStorage.setItem("toltalCost", toltalCost - xPrice );
                    location.reload(true);

                })
            }else {
                cartPage.find(".woocommerce-cart-form, .cart-collaterals").css("display","none");

                cartPage.append("<div class='empty-cart'> please add some item <a href='#'> go to project</a> </div>")
            }
        },
        checkoutUpdat: function (){
            let donationAmount = $("#donation_amount");
            let submitBtn = $("input[name='wds_donate']");
            let projectsInCart = JSON.parse(localStorage.getItem("projectsInCart"));
            console.log(donationAmount);
            let totalDonation = parseInt(localStorage.getItem("toltalCost"));
            console.log(totalDonation);
            donationAmount.val(totalDonation);
            Object.values(projectsInCart).map((item, x) => {
                if (item.name) {
                    $("input[name='wds_donate']").after(`<input type='hidden' name='project[]'  value='${item.ID}-${item.name}-${item.price}'>`);
                };
                if (item.subscription == 0) {
                    $("#js-switch").css("display","none");
                }
            })
        

        }


    }

    $(document).ready(function () {
        console.log(localStorage.getItem("projectsInCart"));
        cartSystem.init();
    });


}(jQuery));

