const formulario = document.querySelector("#cadMsgCont");

formulario.onsubmit = evento => {
    
   // Receber o valor do campo Nome
   var nome = document.querySelector("#nome").value;
   //Verifica se o campo esta vazio
   if(nome == ""){
      evento.preventDefault();
      document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo nome JS!<p/>";
      return;
   }

   // Receber o valor do campo E-mail
   var email = document.querySelector("#email").value;
   //Verifica se o campo esta vazio
   if(email == ""){
      evento.preventDefault();
      document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo E-mail JS!<p/>";
      return;
   }

   // Receber o valor do campo Assunto
   var assunto = document.querySelector("#assunto").value;
   //Verifica se o campo esta vazio
   if(assunto == ""){
      evento.preventDefault();
      document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo Assunto JS!<p/>";
      return;
   }

   // Receber o valor do campo Conteúdo
   var conteudo = document.querySelector("#conteudo").value;
   //Verifica se o campo esta vazio
   if(conteudo == ""){
      evento.preventDefault();
      document.getElementById("msgAlerta").innerHTML = "<p style='color: #f00;'>Erro: Necessário preencher o campo Conteúdo JS!<p/>";
      return;
   }

   
}