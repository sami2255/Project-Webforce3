$(function() {
    
//    console.log(testMike);
    $.ajax({
        url: "http://localhost/alsaleh_keita/Git/php-object-webforce3/single/"+idItem,
        method: "POST", 
//        datatype: "json"
    }).done(function(data){
        console.log(data);
        data = JSON.parse(data); 
//        $("div.sp-wrap").html("");
//         var codeHTML = '';
        for (var i = 0; i < data.pictures.length; i++) {
			$("div.sp-wrap").append('<a href="'+data.pictures[i].url+'"><img src="'+data.pictures[i].url+'" alt=""></a>');
		}
    }).fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
    })
});