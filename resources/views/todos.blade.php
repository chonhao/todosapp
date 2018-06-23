<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Todo App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/index.css">
</head>
<body>
<div class="container">
<h1>Hello there, here is your todo list</h1> 
<br>
<form action="../todo_create" method="post" class="form-inline">
    {{ csrf_field() }}
    <input type="text" id="create_input" class="form-control" name="content" placeholder="insert your new todo here"/>
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
    <input type="submit" value="submit" class="btn btn-success"/>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif

<br>

<?php    
    echo "<table id='list_table'>";
    foreach($todosFromDB as $todo){
        echo "<tr><form method='post' action='../todo_update'>";
        echo csrf_field();
        echo "<td><input type='text' class='list_input' name='content' value='$todo->content'/></td>";
        echo "<td><input type='hidden' name='item_id' value='$todo->id'/>"
                ."<input type='hidden' name='user_id' value='$user_id'/>"
                ."<input type='submit' value='update' class='btn btn-default'/></td>";
        echo "</form>";


        echo "<td><form method='post' action='../todo_delete'>";
        echo csrf_field();
        echo "<input type='hidden' name='item_id' value='$todo->id'/>"
                ."<input type='hidden' name='user_id' value='$user_id'/>"
                ."<input type='submit' value='delete' class='btn btn-danger'/></form></td>";
        echo "</tr>";
    }
    echo "</table>";
?>



</div>
</body>
</html>
