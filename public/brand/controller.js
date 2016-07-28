'use strict;'

angular.module('app')
    .controller('ctrl.brand', function($scope, $filter, $resource, appSettings){

        var vm              =   $scope;

        var Brands          =   $resource(appSettings+'v1/brands', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var BrandsId        =   $resource(appSettings+'v1/brands/:id', {

        }, {
            show        :   {
                method  :   'GET',
                isArray :   false
            },
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Brands.query().$promise.then(function(data){

            vm.brands       =   $filter('orderBy')(data.brands, 'str_brand_name', false);

        });

        vm.saveBrand        =   function(){

            Brands.save(vm.newBrand).$promise.then(function(data){

                alert(data.message);
                vm.brands.push(data.brand);
                vm.brands           =   $filter('orderBy')(vm.brands, 'str_brand_name', false);
                vm.newBrand         =   null;

            })
                .catch(function(response){

                    if (response.status == 500){

                        alert(response.data.message);

                    }

                });

        }

        vm.getBrand         =   function(brand, index){

            BrandsId.show({id : brand.int_brand_id}).$promise.then(function(data){

                vm.updateBrand          =   data.brand;
                vm.updateBrand.index    =   index;

            });

        }

        vm.saveUpdate       =   function(){

            BrandsId.update({id : vm.updateBrand.int_brand_id}, vm.updateBrand).$promise.then(function(data){

                alert(data.message);
                vm.brands.splice(vm.updateBrand.index, 1);
                vm.brands.push(data.brand);
                vm.brands           =   $filter('orderBy')(vm.brands, 'str_brand_name', false);
                vm.updateBrand      =   null;

            });

        }

        vm.deleteBrand      =   function(brand, index){

            BrandsId.destroy({id : brand.int_brand_id}).$promise.then(function(data){



            });

        }
        
    });