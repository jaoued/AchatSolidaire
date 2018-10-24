//
// pour un carroussel avec img
//tableaucarroussel
//eq  seul moyen pour parcourir un tab en JQUERY , sinon [] on sort de jquery
// $('img').eq(i) !=  $('img')[0]

// .children permet d acceder à l enfant de  de l element cible.stock tout ds un array
// console.log($('section#slider').children().children().attr("src"))
$(function(){
    for (var i=0; i < $("img").length; i++)
        console.log( $("img").eq(i).attr("src"))    
    
    //setinterval et settimeout : a la fin du timeout j execute la fct
    let i=0;
    setInterval(function(){
        $("section img").attr("src", tableaucarroussel[i])
       
        //console.log('affichage')
        i=(tableaucarroussel.length == i) ? 0 : i +1;
    },3000);
    
     $("section img").click(function(){
         console.log('Afficher')
     })
    

}