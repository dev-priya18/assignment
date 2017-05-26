/* All service will come here */
app = angular.module('assignmentProject');
app.service('commonService',function($q, $http, $rootScope){
	this.apiPost = function(url, postData){
		var deferred = $q.defer();

		$http.post(url,postData).success(function(data){
			deferred.resolve(data);
		}).error(function(err) {
			deferred.reject(err);
		});
		return deferred.promise;
	}
	this.apiGet = function(url)
	{
		var deferred = $q.defer();

		$http.get(url).success(function(data){
			deferred.resolve(data);
		}).error(function(err) {
			deferred.reject(err);
		});
		return deferred.promise;
	}
	this.getLangauge = function(key)
	{
		var deferred = $q.defer();
		url = site_url+'home/lang_data/'+key;
		console.log(url);

		$http.get(url).success(function(data){
			deferred.resolve(data);
		}).error(function(err) {
			deferred.reject(err);
		});
		return deferred.promise;	
	}
    
});
