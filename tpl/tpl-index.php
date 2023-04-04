<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title><?= BASE_TITLE ?></title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="page">
    <div class="pageHeader">
      <div class="title">Dashboard</div>
      <div class="userPanel">
        <i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40" />
      </div>
    </div>
    <div class="main">
      <div class="nav">
        <div class="searchbox">
          <div>
            <i class="fa fa-search"></i>
            <input type="search" placeholder="Search" />
          </div>
        </div>
        <div class="menu">
          <div class="title">folders</div>
          <ul class="folder-list">
            <li class="<?= !isset($_GET['folder_id']) ? 'active' : '' ?>"><a href="<?= site_url(); ?>"><i class="fa fa-folder"></i>All</a></li>
            <?php foreach ($folders as $folder) : ?>
              <li class="<?= isset($_GET['folder_id']) && $_GET['folder_id'] == $folder->id ? 'active ' : ''; ?>"><a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i><?= $folder->name ?><a href="?deleteFolder=<?= $folder->id ?>" class="remove"><i class="fa fa-trash-o"></i></a></li>
            <?php endforeach; ?>
          </ul>
          <div>
            <input type="text" placeholder="Add New Folder" class="newFolderAdd" />
            <button class="newFolderBtn">+</button>
          </div>
        </div>
      </div>
      <div class="view">
        <div class="viewHeader">
          <div class="title"><input type="text" placeholder="Add New Task" class="addNewTask"></div>
          <div class="functions">
            <div class="button active">Add New Task</div>
            <div class="button">Completed</div>
            <div class="button inverz"><i class="fa fa-trash-o"></i></div>
          </div>
        </div>
        <div class="content">
          <div class="list">
            <div class="title">Today</div>
            <ul>
              <?php if (sizeof($tasks)) : ?>
                <?php foreach ($tasks as $task) : ?>
                  <li class="<?= $task->is_done ? "checked" : ""; ?>">
                    <i data-taskId="<?= $task->id; ?>" class="check <?= $task->is_done ? "fa fa-check-square-o" : "fa fa-square-o"; ?>"></i><span><?= $task->title; ?></span>
                    <div class="info">
                      <span>Create at <?= $task->create_at ?></span>
                      <a href="?deleteTask=<?= $task->id ?>&folder_id=<?= $task->folder_id  ?>" onclick="confirm('Are sure to delete <?= $task->title; ?>')" class="remove"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <li>No Task here...</li>
              <?php endif; ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
      $(document).ready(function(e) {
        $(".check").click(function(e) {
          var tid = $(this).attr("data-taskId");
          $.ajax({
            url: "process/ajaxHandler.php",
            method: "post",
            data: {
              action: "statusToggle",
              taskId: tid,

            },
            success: function(response) {
              if (response == 1) {
                location.reload();
              } else {
                alert(response);
              }
            },
          });
        });


        var input = $(".newFolderAdd");
        $(".newFolderBtn").click(function() {
          $.ajax({
            url: "process/ajaxHandler.php",
            method: "post",
            data: {
              action: "addNewFolder",
              foldername: input.val()
            },
            success: function(response) {
              if (response == 1) {
                $('<li><a href="?folder_id=<?= $folder->id ?>"><i class="fa fa-folder"></i>' + input.val() +
                  '<a href="?deleteFolder=<?= $folder->id ?>" class="remove"><i class="fa fa-trash-o"></i></a></li>').appendTo('ul.folder-list');
              } else {
                alert(response);
              }
            },
          });
        });
        $(".addNewTask").on('keypress', function(e) {
          if (e.which == 13) {
            $.ajax({
              url: "process/ajaxHandler.php",
              method: "post",
              data: {
                action: "addNewTask",
                Task: $(".addNewTask").val(),
                folder_id: <?= $_GET['folder_id'] ?? 0; ?>
              },
              success: function(response) {
                if (response == 1) {
                  location.reload();
                } else {
                  alert(response);
                }
              }
            });
          }
        });
        $(".addNewTask").focus();

      });
    </script>
</body>

</html>