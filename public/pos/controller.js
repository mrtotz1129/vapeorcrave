'use strict;'

angular.module('app')
    .controller('ctrl.pos', function($scope, $resource, $filter, appSettings){

        var vm              =   $scope;

        vm.cartProducts     =   [];
        
        var Products        =   $resource(appSettings.baseUrl+'v1/products/inventories', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var POS             =   $resource(appSettings.baseUrl+'v1/point-of-sales', {} );

        Products.query().$promise.then(function(data){

            vm.products             =   $filter('orderBy')(data.inventories, 'str_product_name', false);
        });

        var copyProduct             =   function(product){

            var newProduct                  =   {};

            newProduct.int_product_id       =   product.int_product_id;
            newProduct.deci_price           =   product.deci_price;
            newProduct.str_brand_name       =   product.str_brand_name;
            newProduct.str_category_name    =   product.str_category_name;
            newProduct.str_volume_name      =   product.str_volume_name;
            newProduct.str_product_name     =   product.str_product_name;
            newProduct.int_nicotine_level   =   product.int_nicotine_level;
            newProduct.int_price_id         =   product.int_price_id;

            return newProduct;

        }

        vm.openAddToCart            =   function(product, index){

            vm.addToCartProduct         =   copyProduct(product);
            vm.addToCartProduct.index   =   index;

        }

        vm.addToCart                =   function(){

            var index = null;
            angular.forEach(vm.cartProducts, function(product, productIndex){

                if (product.int_product_id == vm.addToCartProduct.int_product_id){

                    index       =   productIndex;

                }

            });
            console.log(index);

            if (index == null){

                vm.cartProducts.push(vm.addToCartProduct);

            }else{

                vm.cartProducts[index].int_quantity += vm.addToCartProduct.int_quantity;

            }

            vm.products[vm.addToCartProduct.index].int_current_value    -=  vm.addToCartProduct.int_quantity;
            $('#addToCart').modal('hide');
            vm.addToCartProduct                 =   null;

        }

        vm.checkOut                 =   function(){

            var deciTotalPrice      =   0;
            angular.forEach(vm.cartProducts, function(product){

                deciTotalPrice      +=  (product.deci_price * product.int_quantity);

            });

            vm.deciTotalPrice       =   deciTotalPrice;

        }

        vm.processPayment           =   function(){

            var validate            =   false;
            var message             =   null;

            if (vm.deciTotalPrice > vm.checkout.deci_amount_paid){

                validate            =   true;
                message             =   'Amount to pay is greater than amount paid.';

            }

            if (validate){

                alert(message);

            }else{

                vm.checkout.products    =   vm.cartProducts;
                var transaction         =   new POS(vm.checkout);
                transaction.$save(function(data, response){

                    alert(data.message);
                    $('#checkoutmodal').modal('hide');
                    vm.checkout         =   null;
                    vm.cartProducts     =   null;
                    vm.cartProducts     =   [];

                },
                    function(response){

                        if (response.status == 404){

                            alert('Page not found.');

                        }else if (response.status == 500){

                            alert(response.data.message);

                        }

                    });

            }

        }

    });