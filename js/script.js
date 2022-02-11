
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
    
        $.ajax({
            url: 'select.php',
            method: 'GET',
            data: {busca:"nome", nome:valueBusca},
            dataType: 'json'
        }).done(function(result){
            $('#tblResultados > tbody > tr').remove();
            
            for(let p = 0; p < result.length;p++){ 
                $('#tblResultados > tbody').append('<tr><td>'+result[p].idusuario+'</td><td>'+result[p].nome+'</td><td>'
                +result[p].login+'</td><td>'+result[p].email+'</td> <td><button type = "button" style="border-style: none;" onclick="preencheInputs('+result[p].idusuario+');"><img src="img/lapis.png" alt="editar"></button> '
                +'<button type = "button" style="border-style: none;" onclick = "deletarUsuario('+result[p].idusuario+');"><img src="img/lixeira.png" alt="excluir"></button>'+'</td> </tr>');
            }
            document.querySelector('#cont').textContent = `Resultados : ${result.length}`;
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
  