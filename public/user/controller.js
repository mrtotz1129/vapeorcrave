'use strict;'

angular.module('app')
    .controller('ctrl.user', function($scope, $resource, $filter, appSettings){

        var vm              =   $scope;

        var Users           =   $resource(appSettings.baseUrl+'v1/users', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var UserEdit        =   $resource(appSettings.baseUrl+'v1/users/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var UserId          =   $resource(appSettings.baseUrl+'v1/users/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Users.query().$promise.then(function(data){

            vm.users            =   $filter('orderBy')(data.active_users, 'name', false);

        });

        vm.saveUser             =   function(){

            Users.save(vm.newUser).$promise.then(function(data){

                alert(data.message);
                vm.users.push(data.user);
                vm.users            =   $filter('orderBy')(vm.users, 'name', false);
                vm.newUser          =   null;

            });

        }

        vm.getUser              =   function(user, index){

            UserEdit.edit({id : user.id}).$promise.then(function(data){

                vm.updateUser       =   data.selected_user_details;
                vm.updateUser.index =   index;

            });

        }

        vm.saveUpdate           =   function(){

            UserId.update({id : vm.updateUser.id}, vm.updateUser).$promise.then(function(data){

                alert(data.message);
                vm.users.splice(vm.updateUser.index, 1);
                vm.users.push(data.user);
                $('#modalUpdate').modal('hide');
                vm.users        =   $filter('orderBy')(vm.users, 'name', false);
                vm.updateUser   =   null;

            });

        }

        vm.deleteUser           =   function(user, index){

            UserId.destroy({id : user.id}).$promise.then(function(data){

                alert(data.message);
                vm.users.splice(index, 1);

            });

        }

    });