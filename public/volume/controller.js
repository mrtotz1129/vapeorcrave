'use strict;'

angular.module('app')
    .controller('ctrl.volume', function($scope, $filter, $resource, appSettings){

        var vm                  =   $scope;

        var Volumes             =   $resource(appSettings.baseUrl+'v1/volumes', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var VolumeEdit          =   $resource(appSettings.baseUrl+'v1/volumes/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var VolumeId            =   $resource(appSettings.baseUrl+'v1/volumes/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Volumes.query().$promise.then(function(data){

            vm.volumes          =   $filter('orderBy')(data.active_volumes, 'str_volume_name', false);

        });

        vm.saveVolume           =   function(){

            Volumes.save(vm.newVolume).$promise.then(function(data){

                alert(data.message);
                vm.volumes.push(data.volume);
                vm.volumes              =   $filter('orderBy')(vm.volumes, 'str_volume_name', false);
                vm.newVolume            =   null;

            });

        }

        vm.getVolume            =   function(volume, index){

            VolumeEdit.edit({id : volume.int_volume_id}).$promise.then(function(data){

                vm.updateVolume         =   data.selected_volume_details;
                vm.updateVolume.index   =   index;

            });

        }

        vm.saveUpdate           =   function(){

            VolumeId.update({id : vm.updateVolume.int_volume_id}, vm.updateVolume).$promise.then(function(data){

                alert(data.message);
                vm.volumes.splice(vm.updateVolume.index, 1);
                vm.volumes.push(data.volume);
                $('#modalUpdate').modal('hide');
                vm.volumes              =   $filter('orderBy')(vm.volumes, 'str_volume_name', false);
                vm.updateVolume         =   null;

            });

        }

        vm.deleteVolume         =   function(volume, index){

            VolumeId.destroy({id : volume.int_volume_id}).$promise.then(function(data){

                alert(data.message);
                vm.volumes.splice(index, 1);

            });

        }

    });