<script type="text/javascript">
	'use strict;'

	var baseUrl     =   'http://localhost:8000/vapeorcrave/api/';

	angular.module('app', [
	    'ngResource',
        'ui.utils.masks'
	])
	    .constant('appSettings', {
	        baseUrl     :   baseUrl,
	        csrfToken	: 	'{!! csrf_token() !!}'
	    })
	    .run(function($rootScope){



	    });
</script>