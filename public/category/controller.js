'use strict;'

angular.module('app')
    .controller('ctrl.category', function($scope, $filter, $resource, appSettings){

        var vm              =   $scope;

        var Categories      =   $resource(appSettings.baseUrl+'v1/categories', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var CategoriesId    =   $resource(appSettings.baseUrl+'v1/categories/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        var CategoryEdit    =   $resource(appSettings.baseUrl+'v1/categories/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        Categories.query().$promise.then(function(data){

            vm.categories           =   $filter('orderBy')(data.active_categories, 'str_category_name', false);

        });

        vm.saveCategory             =   function(){

            Categories.save(vm.newCategory).$promise.then(function(data){

                alert(data.message);
                vm.categories.push(data.category);
                vm.newCategory          =   null;

            });

        }

        vm.getCategory              =   function(category, index){

            CategoryEdit.edit({id : category.int_category_id}).$promise.then(function(data){

                vm.updateCategory           =   data.selected_category_details;
                vm.updateCategory.index     =   index;

            });

        }

        vm.saveUpdate               =   function(){

            CategoriesId.update({id : vm.updateCategory.int_category_id}, vm.updateCategory).$promise.then(function(data){

                alert(data.message);
                vm.categories.splice(vm.updateCategory.index, 1);
                vm.categories.push(vm.updateCategory);
                $('#modalUpdate').modal('hide');
                vm.categories               =   $filter('orderBy')(vm.categories, 'str_category_name', false);
                vm.updateCategory           =   null;

            });

        }

        vm.deleteCategory           =   function(category, index){

            CategoriesId.destroy({id : category.int_category_id}).$promise.then(function(data){

                alert(data.message);
                vm.categories.splice(index, 1);

            });

        }

    });