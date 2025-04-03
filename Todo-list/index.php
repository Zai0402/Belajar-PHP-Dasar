<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Todo List</title>
</head>
<body>
    <div class="todo-container">
        <h1>Todo-list</h1>
        <form class="todo-form" method="post" action="<?= $_SERVER['PHP_SELF'] ; ?>">
            <input type="text" name="task" id="task" placeholder="buat catatan baru">
            <button type="submit" name="add">Tambah</button>
        </form>

        <?php
        // mulai session
        session_start();

        // inisialisasi arrays tasks jika belum ada
        if(!isset($_SESSION['tasks'])){
            $_SESSION['tasks'] = [];
        }

        // jika ada form yang disubmit, maka tambahkan task kedalam array tasks
        if(isset($_POST['add'])){
            $task = trim($_POST['task']);

//          menambahkan task ke session array task
            if(!empty($task)){
                $_SESSION['tasks'][] = $task;
            }
            // redirect untuk menghindari resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
           
        }

          // jika ada request untuk menghapus task/todo
          if(isset($_POST['delete'])){
            $index_to_delete = $_POST['delete'];
            if(isset($_SESSION['tasks'])){
                unset($_SESSION['tasks'][$index_to_delete]);
                // reset indeks array setelah penghapusan
                $_SESSION['tasks'] = array_values($_SESSION['tasks']);
            }
            header("Location: ". htmlspecialchars($_SERVER['PHP_SELF']));

            exit();
        }

        ?>

        <ul class="todo-list">
            <?php foreach ($_SESSION['tasks'] as $index => $task) :?>
                <li> 
                    <?php echo $task ?> 
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" style="display: inline;">
                        <input type="hidden" name="delete" value="<?= $index ?>">
                        <button type="submit" class="delete-btn">Hapus</button>
                    </form>
                </li>  
            <?php endforeach ;?>
        </ul>
    </div>
</body>
</html>