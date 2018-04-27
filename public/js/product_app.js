var app = angular.module('epic_products', ['ngSanitize']);

app.filter('unsafe', ['$sce', function ($sce) {
        return function (input) {
            return $sce.trustAsHtml(input);
        }
    }]);

app.controller('products_controller', function ($scope, $http) {


    $scope.products = products;
    $scope.inCart = inCart;
    $scope.inWishlist = inWishlist;


    // $scope.addToCart = function(){
    //         $http({
    //             method: "get",
    //             url: BASE_URL + "shop/add-to-cart?id="+this.product.id,
    //         }).then(function (response) {
    //             location.reload();
    //             $scope.data = response.data;
    //         });
    //     };


    $scope.sortByPrice = function (by) {
        $scope.byPrice = by;
        this.clearSortPrice();
        event.target.className = "btn btn-classic";
    };

    $scope.clearSortPrice = function () {
        var links = document.querySelectorAll('#sort-price-links button');
        for (var x = 0; x < links.length; x++) {
            links[x].className = "btn btn-secondary";
        }
    };
});