$(document).ready(function()
{
  $("body").on("submit", ".add", function(e)
  {
    event.preventDefault();
    var this_input_area = $(this);

    if( $(this).find('.record').val()!== "" )
    {
      $.ajax
      ({
        type: "POST",
        url: "db.php",
        data:
        {
          record: $(this).find(".record").val(),
          id_of_list: $(this).find(".id_of_list").val()
        },
        success: function(data)
        {
          var last_record = JSON.parse(data);
          var temp_record = $(".div_hidden_record").find(".hidden_record").clone().removeClass("hidden_record");
          temp_record.find(".id_of_record").val(last_record.id);
          temp_record.find(".recording_cell").prepend(last_record.Record);
          this_input_area.parents(".list").find("tbody").append(temp_record);
          $(".record").val('');
        }
      })
    }
    else
    {
      alert("Цель не введена")
    }
  })

  $("#area_add_list").submit(function(event)
  {
    event.preventDefault();

    if($(".name_of_list").val()!=="")
    {
      $.ajax
      ({
        type : "POST",
        url : "db.php",
        data:
        {
          name_of_list : $(".name_of_list").val()
        },
        success : function(data)
        {
          var last_list = JSON.parse(data);
          var temp_list = $(".hidden_list").clone().removeClass("hidden_list").addClass("list");
          temp_list.find(".notebook").after("<h5>" + last_list.Title + "</h5>");
          temp_list.find(".add").prepend("<input type='hidden' name='id_of_list' class='id_of_list' value=" + last_list.id +">");
          console.log(data);
          temp_list.appendTo(".area_for_list");
          $(".name_of_list").val('');

        }
      })
    }
    else
    {
      alert("Введите название нового списка задач");
    }
  })



  $("body").on("click", ".button_change_title", function(e)
  {
    var  temp_name_of_title = $(this).parents('.list').find('h5').text();
    $(this).parents(".list").find('h5').replaceWith('<input class="change_name_list blink" type="text">');
    $(this).parents(".list").find('.change_name_list').val(temp_name_of_title);
  })
  $('body').on("keypress",".change_name_list", function(e)
  {
    if(e.keyCode==13)
    {
      if($(".change_name_list").val()!=="")
      {
        $.ajax
        ({
          type:"POST",
          url:"db.php",
          data:
          {
            change_name_list: $(".change_name_list").val(),
            id_of_list: $(this).parents(".list").find('.id_of_list').val()
          }
        })
        $(this).parents(".list").find('.change_name_list').replaceWith("<h5>" + $('.change_name_list').val() + "</h5>");
      }

    }
  })

  $("body").on("click", ".button_delete_list", function(e)
  {
    $.ajax
    ({
      type : "POST",
      url : "db.php",
      data :
      {
        id_for_delete_list : $(this).parents(".list").find('.id_of_list').val()
      }
    })
    console.log($(this).parents('.list'));
    $(this).parents('.list').remove();
  })

  $("body").on("click", ".button_delete_record", function(e)
  {
    console.log($(this).parents("tr"))
    $.ajax
    ({
      type : "POST",
      url : "db.php",
      data :
      {
        id_for_delete_record: $(this).parents("tr").find(".id_of_record").val()
      }
    })
    $(this).parents("tr").remove();
  })


  $("body").on("click", ".button_change_record", function(e)
  {
    var temp_record = $(this).parents("tr").find(".recording_cell").text();
    $(this).parents("tr").find(".recording_cell").replaceWith('<th class="recording_cell"><input class="input_change_record blink_for_gray" type="text"></th>');
    $(this).parents("tr").find(".input_change_record").val(temp_record);
    click_check_for_record = false;
  })

  $("body").on("keypress", ".input_change_record", function(e)
  {
    if(e.keyCode==13)
    {
      $.ajax
      ({
        type : "POST",
        url : "db.php",
        data :
        {
          id_of_record : $(this).parents("tr").find(".id_of_record").val(),
          record_for_change : $(this).parents("tr").find(".input_change_record").val()
        }
      })
      $(this).parents("tr").find('.input_change_record').replaceWith($(this).parents("tr").find('.input_change_record').val());
    }
  })
  $("body").on("click", ".checkbox", function(e)
  {
    if($(this).prop("checked"))
    {
      $.ajax
      ({
        type: "POST",
        url: "db.php",
        data:
        {
          id_of_record_for_checked : $(this).parents("tr").find(".id_of_record").val(),
          checked: "1"
        }
      })
      $(this).parents("tr").find(".recording_cell").addClass("strike");
    }
    else
    {
      $.ajax
      ({
        type: "POST",
        url: "db.php",
        data:
        {
          id_of_record_for_checked : $(this).parents("tr").find(".id_of_record").val(),
          checked: "0"
        }
      })
      $(this).parents("tr").find(".recording_cell").removeClass("strike");
    }
  })
})
