
document.querySelector('#form-cadastro').addEventListener('submit', (e)=>{

    e.preventDefault();

    let valueId = document.querySelector('#id').value;
    let valueNome = document.querySelector('#nome').value;
    let valueLogin = document.querySelector('#login').value;
    let valueEmail = document.querySelector('#email').value;
    let valueSenha = document.querySelector('#senha').value;

    
    if((valueNome.trim() !== "" && valueNome !== null) && (valueLogin.trim() !== "" && valueLogin !== null) && 
      ((valueEmail.trim() !== "" && valueEmail !== null )) && (valueSenha.trim() !== "" && valueSenha != null)){


    $.ajax({
        url:"insert.php",
        method: 'POST',
        data: {id:valueId, nome:valueNome, login:valueLogin, email:valueEmail, senha:valueSenha},
        dataType: 'json'
    }).done(function(result){
        document.querySelector('#resposta').textContent = result;
        limparCampos();
        
    });
}else{
    document.querySelector('#resposta').textContent = "Os campos não foram devidamente preenchidos";
}

});



function limparCampos(){
    elements = document.querySelector('#form-cadastro').elements;

    for(let i = 0; i <= elements.length; i++){
        elements[i].value = '';
    }
}



function buscarUsuario(){

    let valueBusca = document.querySelector('#txt-busca').value;
    const url = 'select.php';
    
        $.ajax({
            url: url,
            method: 'GET',
            data: {busca:"nome", nome:valueBusca},
            dataType: 'json'
        }).done(function(result){
            $('#tblResultados > tbody > tr').remove();

            console.log(result);

            for(let p = 0; p < (result.length-1);p++){ 
                $('#tblResultados > tbody').append('<tr><td>'+result[p].idusuario+'</td><td>'+result[p].nome+'</td><td>'
                +result[p].login+'</td><td>'+result[p].email+'</td> <td><button type = "button" style="border-style: none;" onclick="preencheInputs('+result[p].idusuario+');"><img src="img/lapis.png" alt="editar"></button> '
                +'<button type = "button" style="border-style: none;" onclick = "deletarUsuario('+result[p].idusuario+');"><img src="img/lixeira.png" alt="excluir"></button>'+'</td> </tr>');
            }

            let posTotal = (result.length-1);//pegando o count dos elementos

            console.log(result[posTotal].total);

            let paginas = (paginar(Number(result[posTotal].total)));
            let urlAction;
            $('#ulPaginado > li').remove();
            for(let i = 0;i<paginas;i++){
                
                urlAction = url+'?nome='+valueBusca+'&busca=buscaAjax&offset='+(i*5); 
                $('#ulPaginado').append('<li class="page-item"><a class="page-link" href="#" onclick="buscarUsuarioPaginado(\''+urlAction+'\');">'+(i+1)+'</a></li>');
            
            }

            document.querySelector('#cont').textContent = `Resultados : ${result[posTotal].total}`;
        });
    
}

function deletarUsuario(id){
    if(confirm("tem certeza que deseja excluir o usuario selecionado?")){

        $.ajax({
            url: 'delete.php',
            method: 'GET',
            data: {id:id},
            dataType: 'json'
        }).done(function(result){
            alert(result);
            buscarUsuario();
        })
    }else{}
}

function preencheInputs(id){

    $.ajax({
        url: 'select.php',
        method: 'GET',
        data: {busca:"id", id:id},
        dataType: 'json'
    }).done(function(result){
        document.querySelector('#id').value = result[0].idusuario;
        document.querySelector('#nome').value = result[0].nome;
        document.querySelector('#login').value = result[0].login;
        document.querySelector('#email').value = result[0].email;
        document.querySelector('#senha').value = result[0].senha;
        document.querySelector('#resposta').textContent = "Usuario carregado para edição!";
    });
    

}

function paginar(total){
    
    totalPagina = (total/5);
    
    if(totalPagina>1 && totalPagina % 2 >0){
        totalPagina++;
    }


    return parseInt(totalPagina);
}



function buscarUsuarioPaginado(urlAction){
    console.log(urlAction);
    const url = 'select.php';
    let valueBusca = document.querySelector('#txt-busca').value;
    $.ajax({
        url: urlAction,
        method: 'GET',
        dataType: 'json'
    }).done(function(result){
        $('#tblResultados > tbody > tr').remove();

        for(let p = 0; p < (result.length-1);p++){ 
            $('#tblResultados > tbody').append('<tr><td>'+result[p].idusuario+'</td><td>'+result[p].nome+'</td><td>'
            +result[p].login+'</td><td>'+result[p].email+'</td> <td><button type = "button" style="border-style: none;" onclick="preencheInputs('+result[p].idusuario+');"><img src="img/lapis.png" alt="editar"></button> '
            +'<button type = "button" style="border-style: none;" onclick = "deletarUsuario('+result[p].idusuario+');"><img src="img/lixeira.png" alt="excluir"></button>'+'</td> </tr>');
        }

        let posTotal = (result.length-1);//pegando o count dos elementos

        console.log(result);
        let paginas = (paginar(Number(result[posTotal].total)));
        //let urlAction;

        $('#ulPaginado > li').remove();
        for(let i = 0;i<paginas;i++){
           urlAction = url+'?nome='+valueBusca+'&busca=buscaAjax&offset='+(i*5); 
                $('#ulPaginado').append('<li class="page-item"><a class="page-link" href="#" onclick="buscarUsuarioPaginado(\''+urlAction+'\');">'+(i+1)+'</a></li>');
        
        }

        document.querySelector('#cont').textContent = `Resultados : ${result[posTotal].total}`;
    });
    

}


