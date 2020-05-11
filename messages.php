<?php
$title = "Messages";
require_once 'template/header.php';
require_once 'config/db_connection.php';
include_once 'includes/uploader.php';

$query = "select *, f.id as message_id, s.id as service_id from forms f
left join services s
on f.service_id = s.id";

$messages = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
if(!isset($_GET['id'])){

?>
<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Document</th>
        <th>Service</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($messages as $message){ ?>
      <tr>
        <td><?php echo $message['message_id'] ?></td>
        <td><?php echo $message['contact_name'] ?></td>
        <td><?php echo $message['contact_email'] ?></td>
        <td><?php echo $message['contact_document'] ?></td>
        <td><?php echo $message['name'] ?></td>
        <td>
          <a href="?id=<?php echo $message['message_id'] ?>" class="btn btn-sm btn-info">View</a>
          <a href="#" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php }else{
  $messageQuery = "select * from forms f
  left join services s
  on f.service_id = s.id
  where f.id =".$_GET['id']." limit 1";
  $message = $mysqli->query($messageQuery)->fetch_array(MYSQLI_ASSOC);
?>
<div class="container" style="margin-top: 2em;">
  <div class="card">
    <h5 class="card-header">
      Message from: <?php echo $message['contact_name'] ?>
      <div class="small"><?php echo $message['contact_email'] ?></div>
    </h5>
    <div class="card-body">
      <div class=""><strong>Service type: </strong><?php if($message['name']){echo $message['name'];}else{echo 'NO_SERVICE_REQUESTED';} ?></div>
        <strong>Message:</strong>
        <?php echo $message['message'] ?>
    </div>
    <div class="card-footer">
      <?php if($message['contact_document']){ ?>
        <strong>Attachment: </strong>
        <a href="<?php echo $message['contact_document'] ?>">Click here</a>
      <?php } ?>
      <button onclick="goBack()" class="btn btn-secondary" style="float:right;">Go Back</button>
      <script> function goBack() { window.history.back();} </script>
    </div>
  </div>
</div>

<?php } require_once 'template/footer.php'; ?>
