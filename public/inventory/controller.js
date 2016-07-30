'use strict;'

angular.module('app')
    .controller('ctrl.inventory', function($scope, $resource, $filter, appSettings){

        var vm                  =   $scope;

        var Products            =   $resource(appSettings.baseUrl+'v1/products', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Inventories         =   $resource(appSettings.baseUrl+'v1/inventories/:id', {
            id          :   '@id'
        });

        Products.query().$promise.then(function(data){

            vm.products             =   $filter('orderBy')(data.active_products, 'str_product_name', false);

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

                var newInventory    =   new Inventories({id : vm.productToAdd.int_product_id}, vm.productToAdd);
                newInventory.$save(function(data, response){

                    alert(data.message);
                    $('#modalInventory').modal('hide');
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