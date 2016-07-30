'use strict;'

angular.module('app')
    .controller('ctrl.inventory', function($scope, $resource, $filter, appSettings){

        var vm                  =   $scope;

        var Products            =   $resource(appSettings.baseUrl+'v1/products/inventories', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Inventories         =   $resource(appSettings.baseUrl+'v1/products/:id/inventories', {
            id          :   '@id'
        });

        Products.query().$promise.then(function(data){

            angular.forEach(data.inventories, function(inventory){

                if (inventory.int_current_value == null){

                    inventory.int_current_value =   parseInt(0);

                }

            });
            vm.products             =   $filter('orderBy')(data.inventories, 'str_product_name', false);

        });

        vm.addInventory             =   function(product, index){

            product.index           =   index;
            vm.productToAdd         =   product;

        }

        vm.processInventory         =   function(){

            var validation          =   false;
            var message             =   null;

            if (vm.productToAdd.int_quantity    ==  null || vm.productToAdd.int_quantity == 0){

                validation          =   true;
                message             =   'Quantity cannot be blank.'

            }

            if (validation){

                alert(message);

            }else{

                vm.productToAdd.id      =   vm.productToAdd.int_product_id;
                var newInventory    =   new Inventories(vm.productToAdd);
                newInventory.$save(function(data, response){

                    alert(data.message);
                    $('#modalInventory').modal('hide');
                    angular.forEach(vm.products, function(product){

                        if (product.int_product_id == vm.productToAdd.int_product_id){

                            product.int_current_value   =   data.inventory.int_current_value;

                        }

                    });
                    vm.productToAdd         =   null;

                },
                    function(response){

                        if (response.status == 404){

                            alert('Page not found!');

                        }else if (response.status == 500){

                            alert(response.data.message);

                        }

                    });

            }

        }

    });