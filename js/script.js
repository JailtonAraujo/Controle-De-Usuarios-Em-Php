
document.querySelector('#form-cadastro').addEventListener('submit', (e)=>{

    
    e.preventDefault();
    let valueId = document.querySelector('#id').value;
    let valueNome = document.querySelector('#nome').value;
    let valueLogin = document.querySelector('#login').value;
    let valueEmail = document.querySelector('#email').value;
    let valueSenha = document.querySelector('#senha').value;
    //const Email = document.querySelector('#email').value;

    
    if((valueNome.trim() !== "" && valueNome !== null) && (valueLogin.trim() !== "" && valueLogin !== null) && 
      ((valueEmail.trim() !== "" && valueEmail !== null )) && (valueSenha.trim() !== "" && valueSenha != null)){

        e.preventDefault();

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



document.querySelector('#btn-busca').addEventListener('click', (e)=>{
    e.preventDefault();

    let valueBusca = document.querySelector('#txt-busca').value;
    
        $.ajax({
            url: 'select.php',
            method: 'GET',
            data: {busca:valueBusca},
            dataType: 'json'
        }).done(function(result){
            $('#tblResultados > tbody > tr').remove();
            
            for(let p = 0; p < result.length;p++){
                $('#tblResultados > tbody').append('<tr><td>'+result[p].idusuario+'</td><td>'+result[p].nome+'</td><td>'
                +result[p].login+'</td><td>'+result[p].email+'</td> <td><button type = "button" style="border-style: none;"><img src="img/lapis.png" alt="editar"></button> '
                +'<button type = "button" style="border-style: none;"><img src="img/lixeira.png" alt="excluir"></button>'+'</td> </tr>');
            }
        });
    
});


  