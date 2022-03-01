const formulario = document.querySelector("#cadMsgCont");

formulario.onsubmit = evento => {
    // Receber o valor do campo
   var nome = document.querySelector("#nome").value;
   console.log(nome);

   //Verifica se o campo esta vazio
   if(nome == ""){
      evento.preventDefault();
      document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo nome JS!<p/>";
      return;
   }

   
}