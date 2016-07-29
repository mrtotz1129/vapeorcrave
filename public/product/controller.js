'use strict;'

angular.module('app')
    .controller('ctrl.product', function($scope, $filter, $resource, appSettings){

        var vm              =   $scope;

        var Categories      =   $resource(appSettings.baseUrl+'v1/categories', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Brands          =   $resource(appSettings.baseUrl+'v1/brands', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Volumes         =   $resource(appSettings.baseUrl+'v1/volumes', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Nicotines       =   $resource(appSettings.baseUrl+'v1/nicotines', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var Products        =   $resource(appSettings.baseUrl+'v1/products', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var ProductEdit     =   $resource(appSettings.baseUrl+'v1/products/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var ProductId       =   $resource(appSettings.baseUrl+'v1/products/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Categories.query().$promise.then(function(data){

            vm.categories           =   $filter('orderBy')(data.active_categories, 'str_category_name', false);

        })

        Brands.query().$promise.then(function(data){

            vm.brands               =   $filter('orderBy')(data.active_brands, 'str_brand_name', false);

        });

        Volumes.query().$promise.then(function(data){

            vm.volumes              =   $filter('orderBy')(data.active_volumes, 'str_volume_name', false);

        });

        Nicotines.query().$promise.then(function(data){

            vm.nicotines            =   $filter('orderBy')(data.active_nicotine_levels, 'int_nicotine_level', false);

        });

        Products.query().$promise.then(function(data){

            vm.products             =   $filter('orderBy')(data.active_products, 'str_product_name', false);

        });

        vm.saveProduct              =   function(){

            Products.save(vm.newProduct).$promise.then(function(data){

                alert(data.message);
                data.product.deci_price         =   data.price.deci_price;
                vm.products.push(data.product);
                vm.products         =   $filter('orderBy')(vm.products, 'str_product_name', false);
                vm.newProduct       =   null;

            });

        }

        vm.getProduct               =   function(product, index){

            ProductEdit.edit({id : product.int_product_id}).$promise.then(function(data){

                vm.updateProduct            =   data.selected_product_details;
                vm.updateProduct.index      =   index;

            });

        }

        vm.saveUpdate               =   function(){

            ProductId.update({id : vm.updateProduct.int_product_id}, vm.updateProduct).$promise.then(function(data){

                alert(data.message);
                data.product.deci_price     =   data.price.deci_price;
                vm.products.splice(vm.updateProduct.index, 1);
                vm.products.push(data.product);
                $('#modalUpdate').modal('hide');
                vm.products                 =   $filter('orderBy')(vm.products, 'str_product_name', false);
                vm.updateProduct            =   null;

            });

        }

        vm.deleteProduct            =   function(product, index){

            ProductId.destroy({id : product.int_product_id}).$promise.then(function(data){

                alert(data.message);
                vm.products.splice(index, 1);

            });

        }

    });