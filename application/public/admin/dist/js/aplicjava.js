// JavaScript Document
    /* MÃ¡scaras ER */  
    function mascara(o,f){  
        v_obj=o  
        v_fun=f  
        setTimeout("execmascara()",1)  
    }  
    function execmascara(){  
        v_obj.value=v_fun(v_obj.value)  
    }  
    function mcep(v){  
        v=v.replace(/\D/g,"")                    //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Esse Ã© tÃ£o fÃ¡cil que nÃ£o merece explicaÃ§Ãµes  
        return v  
    }  
    function mtel(v){  
        v=v.replace(/\D/g,"")                 //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca parÃªnteses em volta dos dois primeiros dÃ­gitos  
        v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca hÃ­fen entre o quarto e o quinto dÃ­gitos  
        return v  
    }  
    function cnpj(v){  
        v=v.replace(/\D/g,"")                           //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dÃ­gitos  
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dÃ­gitos  
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dÃ­gitos  
        v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hÃ­fen depois do bloco de quatro dÃ­gitos  
        return v  
    }  
    function mcpf(v){  
        v=v.replace(/\D/g,"")                    //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dÃ­gitos  
        v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dÃ­gitos  
                                                 //de novo (para o segundo bloco de nÃºmeros)  
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hÃ­fen entre o terceiro e o quarto dÃ­gitos  
        return v  
    }  
    function mdata(v){  
        v=v.replace(/\D/g,"");                    //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/(\d{2})(\d)/,"$1/$2");  
        v=v.replace(/(\d{2})(\d)/,"$1/$2");  
      
        v=v.replace(/(\d{2})(\d{2})$/,"$1$2");  
        return v;  
    }  
    function mtempo(v){  
        v=v.replace(/\D/g,"");                    //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/(\d{1})(\d{2})(\d{2})/,"$1:$2.$3");  
        return v;  
    }  
    function mhora(v){  
        v=v.replace(/\D/g,"");                    //Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/(\d{2})(\d)/,"$1h$2");  
        return v;  
    }  
    function mrg(v){  
        v=v.replace(/\D/g,"");                                      //Remove tudo o que nÃ£o Ã© dÃ­gito  
            v=v.replace(/(\d)(\d{7})$/,"$1.$2");    //Coloca o . antes dos Ãºltimos 3 dÃ­gitos, e antes do verificador  
            v=v.replace(/(\d)(\d{4})$/,"$1.$2");    //Coloca o . antes dos Ãºltimos 3 dÃ­gitos, e antes do verificador  
            v=v.replace(/(\d)(\d)$/,"$1-$2");               //Coloca o - antes do Ãºltimo dÃ­gito  
        return v;  
    }  
    function mnum(v){  
        v=v.replace(/\D/g,"");                                      //Remove tudo o que nÃ£o Ã© dÃ­gito  
        return v;  
    }  
    function mvalor(v){  
        v=v.replace(/\D/g,"");//Remove tudo o que nÃ£o Ã© dÃ­gito  
        v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhÃµes  
        v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares  
      
        v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 Ãºltimos dÃ­gitos  
        return v;  
    }  