$(document).ready(function () {
   $("#send_comment").click(function () {
      //console.log(1);
      let name = $("#name");
      let email = $("#email");
      let message = $("#message");

      if(name.val() != '' && email.val() != '' && message.val != ''){ //все поля д.б. заполнены
         $.ajax({
            type: 'post',
            url: '/ajax/comments_ajax.php',
            data: $("#form").serialize(),
            success: function(data){

               let d = JSON.parse(data); //преобразует json в объект
               //console.log(d);
               $("#comments").html(d.comments);
               $("#cc").html(d.cc);

               name.val('');
               email.val('');
               message.val('');
               //let cc = $("#cc").html(); //получили колич-во комментариев и записали её в переменную
               //let newCc = parseInt(cc) + 1; //увеличиваем на 1
               //$("#cc").html(newCc); // перезаписываем span

            }
         });

      }else{
         $("#form_error").html("Заполните все поля");
      }
   });

      $("input, textarea").focus(function () {   //очищаем ошибки
      $("#form_error").html("");
   });

});