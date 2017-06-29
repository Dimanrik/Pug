$(document).ready(function()
{
  $("#form1").submit(function(event)
  {
    event.preventDefault();
    if ($(".name").val()!=="" &  $(".color").val()!=="")
    {
      $.ajax
      ({
        type:"POST",
        url: "db.php",
        data:
        {
          name: $(".name").val(),
          color: $(".color").val()
        },
        success: function(data)
        {
          var anys = JSON.parse(data);
          var id = anys.id;
          console.log(id);
           $('tbody').append("<tr><th>" + anys.id + "<th>" + anys.name + "<th>"+ anys.color + "</tr>")

        }
      })
      .done(function()
      {
        alert("Данные получены, скоро мопсик родится");
      })
    }
    else
    {
      alert("Не все поля заполнены")
    }
  })
})
