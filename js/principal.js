// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()

  
  function limparCampos(){
      let elements = document.querySelector('form').elements;
      
      for(let i = 0; i <= elements.length;i++){
          elements[i].value = '';
      }
  }

  document.querySelector('#btn-busca').addEventListener('click', (e)=>{
      let nomeBusca = document.querySelector('#txt-busca').value;
      let urlAction = document.querySelector('form').action;


      if(nomeBusca != null && nomeBusca != "" && nomeBusca.trim() != ""){
        
        $.post("cadastrar.php", {buscar:nomeBusca})
          .done(function(response){
            console.log(response);
          })
    }
          
      
  });