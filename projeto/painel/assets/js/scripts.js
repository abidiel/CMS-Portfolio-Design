$(function(){

    var open = true;

    // quando coloca o [0], podemos acessar funcoes do javascript puro
    // innerWidth = tamanho do viewport
    var windowsSize = $(window)[0].innerWidth;

    if (windowsSize <= 768){

        // css com jquery
        $('.menu').css('width','0').css('padding','0');

        // significa que o menu esta fechado
        open = false;
        
    }

    // adicionando propriedades e animacoes com jquery
    $('.menu_btn').click(function(){
        if(open){

            $('.menu').animate({'width':'0'},function(){
                open = false;
                console.log('menu fechado')
            } );
            $('.content,header').css({'width':'100%'});
            $('.content,header').animate({'left':'0'},function(){
                open = false;
                console.log('menu fechado')
            } );
            
        }else{
            $('.menu').css('display','block');
            $('.menu').animate({'width':'300px'},function(){
                open = true;
                console.log('menu aberto')
            } );
            $('.content,header').css({'width':'calc(100% - 300px)'});
            $('.content,header').animate({'left':'300px'},function(){
                open = true;
                console.log('menu aberto')
            } );

        }
    })

    //utilizando o jquery.mask
    $('[formato=data]').mask('99/99/9999');

})