'use strict;'

angular.module('app')
    .controller('ctrl.position', function($scope, $filter, $resource, appSettings){

        var vm                  =   $scope;

        var Positions           =   $resource(appSettings.baseUrl+'v1/positions', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var PositionEdit        =   $resource(appSettings.baseUrl+'v1/positions/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var PositionId          =   $resource(appSettings.baseUrl+'v1/positions/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Positions.query().$promise.then(function(data){

            vm.positions            =   $filter('orderBy')(data.active_positions, 'str_position_name', false);

        });

        vm.savePosition         =   function(){

            Positions.save(vm.newPosition).$promise.then(function(data){

                alert(data.message);
                vm.positions.push(data.position);
                vm.positions        =   $filter('orderBy')(vm.positions, 'str_position_name', false);

            });

        }

        vm.getPosition          =   function(position, index){

            PositionEdit.edit({id : position.int_position_id}).$promise.then(function(data){

                vm.updatePosition       =   data.selected_position_details;
                vm.updatePosition.index =   index;

            });

        }

        vm.saveUpdate           =   function(){

            PositionId.update({id : vm.updatePosition.int_position_id}, vm.updatePosition).$promise.then(function(data){

                alert(data.message);
                vm.positions.splice(vm.updatePosition.index, 1);
                vm.positions.push(data.position);
                $('#modalUpdate').modal('hide');
                vm.positions                    =   $filter('orderBy')(vm.positions, 'str_position_name', false);
                vm.updatePosition               =   null;

            });

        }

        vm.deletePosition       =   function(position, index){

            PositionId.destroy({id : position.int_position_id}).$promise.then(function(data){

                alert(data.message);
                vm.positions.splice(index, 1);

            });

        }

    });