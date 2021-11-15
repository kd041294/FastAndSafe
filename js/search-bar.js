$(document).ready(function(){
    $("#search").keyup(function(){
        var searchText = $(this).val();
        if(searchText !== ''){
            $.ajax({
                url: './api/search-products.php',
                method: 'post',
                data: {query: searchText},
                success:function(response){
                    $("#show-list").html(response);
                }
            });
        }
        else{
            $('#show-list').hide('No match found');
        }
    });
    $("#search-mob").keyup(function(){
        var searchText = $(this).val();
        if(searchText !== ''){
            $.ajax({
                url: './api/search-products.php',
                method: 'post',
                data: {query: searchText},
                success:function(response){
                    $("#show-list-mob").html(response);
                }
            });
        }
        else{
            $('#show-list-mob').hide('No match found');
        }
    });
});