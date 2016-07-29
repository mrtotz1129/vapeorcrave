'use strict;'

angular.module('app')
    .controller('ctrl.nicotine', function($scope, $resource, $filter, appSettings){

        var vm              =   $scope;

        var Nicotines       =   $resource(appSettings.baseUrl+'v1/nicotines', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var NicotineEdit    =   $resource(appSettings.baseUrl+'v1/nicotines/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var NicotineId      =   $resource(appSettings.baseUrl+'v1/nicotines/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Nicotines.query().$promise.then(function(data){

            vm.nicotines        =   $filter('orderBy')(data.active_nicotine_levels, 'int_nicotine_level', false);

        });

        vm.saveNicotine         =   function(){

            Nicotines.save(vm.newNicotine).$promise.then(function(data){

                alert(data.message);
                vm.nicotines.push(data.nicotine);
                vm.nicotines            =   $filter('orderBy')(vm.nicotines, 'int_nicotine_level', false);
                vm.newNicotine          =   null;

            });

        }

        vm.getNicotine          =   function(nicotine, index){

            NicotineEdit.edit({id : nicotine.int_nicotine_id}).$promise.then(function(data){

                vm.updateNicotine           =   data.selected_nicotine_level_details;
                vm.updateNicotine.index     =   index;

            });

        }

        vm.saveUpdate           =   function(){

            NicotineId.update({id : vm.updateNicotine.int_nicotine_id}, vm.updateNicotine).$promise.then(function(data){

                alert(data.message);
                vm.nicotines.splice(vm.updateNicotine.index, 1);
                vm.nicotines.push(data.nicotine);
                $('#modalUpdate').modal('hide');
                vm.updateNicotine               =   null;

            });

        }

        vm.deleteNicotine       =   function(nicotine, index){

            NicotineId.destroy({id : nicotine.int_nicotine_id}).$promise.then(function(data){

                alert(data.message);
                vm.nicotines.splice(index, 1);

            });

        }

    });