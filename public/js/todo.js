const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
  function getTodoList (element, status) {
    var loading;
    $.ajax({
        url:"/to-do-list/get-to-do-list",
        data:
        { 
            send:true,
            status:status
        },
        beforeSend: function() {
          if (status === 0) {
            loading = "#todo-loading";
          } else if (status === 1) {
            loading = "#doing-loading";
          } else if (status === 2) {
            loading = "#done-loading";
          }
          $(loading).css('display','block');
          $(element).css('display','none');
        },
        success:function(data){
          $(element).append(data);
          $(loading).css('display','none');
          $(element).css('display','block');
        }
    });
  }

  function refreshTodo (element, status) {
    $(element).empty();
    getTodoList(element, status);
  }

  getTodoList('#todo-list', 0);
  getTodoList('#doing-list', 1);
  getTodoList('#done-list', 2);

  $('#add-form').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url: "to-do-list/add",
        type: 'POST',
        dataType: 'JSON',
        data: {
          _token: CSRF_TOKEN, 
          name: $('#name').val(),
          description: $('#description').val()
        },
        success: function (data) { 
          $('#todo-list').empty();
          getTodoList('#todo-list', 0);
          $('.close').click();
        }
    }); 
  });

  $(document).on('click', '.changeStatus', function(){
    var id = $(this).attr('id');
    $.ajax({
        url:"to-do-list/change-status",
        data:
        { 
          send:true,
          id:id
        },
        success:function(data){
          var status = data.data.status;
          if (status === 0) {
            refreshTodo('#todo-list', 0);
          } else if (status === 1) {
            refreshTodo('#todo-list', 0);
            refreshTodo('#doing-list', 1);
          } else if (status === 2) {
            refreshTodo('#doing-list', 1);
            refreshTodo('#done-list', 2);
          }
        }
    });
  });

  $(document).on('click', '.deleteTodo', function(){
    var id = $(this).attr('id');
    $.ajax({
        url: "to-do-list/delete",
        type: 'POST',
        dataType: 'JSON',
        data: {
          _token: CSRF_TOKEN, 
          id: id
        },
        success: function (data) { 
          var status = data.data.status;
          if (status === 0) {
            refreshTodo('#todo-list', 0);
          } else if (status === 1) {
            refreshTodo('#doing-list', 1);
          } else if (status === 2) {
            refreshTodo('#done-list', 2);
          }
        }
    });
  });

});