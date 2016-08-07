'use strict;'

angular.module('app')
    .controller('ctrl.branch', function($scope, $filter, $resource, appSettings){

        var vm              =   $scope;

        var Branches        =   $resource(appSettings.baseUrl+'v1/branches', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var BranchEdit      =   $resource(appSettings.baseUrl+'v1/branches/:id/edit', {}, {
            edit        :   {
                method  :   'GET',
                isArray :   false
            }
        });

        var BranchId        =   $resource(appSettings.baseUrl+'v1/branches/:id', {}, {
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

        Branches.query().$promise.then(function(data){

            vm.branches     =   $filter('orderBy')(data.active_branches, 'str_branch_location', false);

        });

        vm.saveBranch       =   function(){

            Branches.save(vm.newBranch).$promise.then(function(data){

                alert(data.message);
                vm.branches.push(data.branch);
                vm.newBranch            =   null;

            });

        }

        vm.getBranch        =   function(branch, index){

            BranchEdit.edit({id : branch.int_branch_id}).$promise.then(function(data){

                vm.updateBranch         =   data.selected_branch_details;
                vm.updateBranch.index   =   index;

            });

        }

        vm.saveUpdate       =   function(){

            BranchId.update({id : vm.updateBranch.int_branch_id}, vm.updateBranch).$promise.then(function(data){

                alert(data.message);
                vm.branches.splice(vm.updateBranch.index, 1);
                vm.branches.push(data.branch);
                $('#modalUpdate').modal('hide');
                vm.branches             =   $filter('orderBy')(vm.branches, 'str_branch_location', false);
                vm.updateBranch         =   null;

            });

        }

        vm.deleteBranch     =   function(branch, index){

            BranchId.destroy({id : branch.int_branch_id}).$promise.then(function(data){

                alert(data.message);
                vm.branches.splice(index, 1);

            })

        }

    });