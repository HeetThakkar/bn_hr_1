<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="brandniti.com"><img src="../images/brandniti+designlogo.png" alt="" height="20px"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      
      <?php if($_SESSION["Department"]!="admin" ){ ?>
        <li><a href="insights.php">Insight </a></li>
      <li><a href="reimbursement.php">Reimbursement</a></li>
      <li><a href="request_leave.php">Request Leave</a></li>
      <?php }?>
      <?php if($_SESSION["Department"]=="team_manager"){ ?>
        <li><a href="fill_tasksheet.php">Task Sheet</a></li>
        <?php }?>
        <?php if($_SESSION["Department"]=="hr" ||$_SESSION["Department"]=="admin" ){ ?>
        <li><a href="leave_approval.php">Approve Leaves</a></li>
        <li><a href="reimbursement_approval.php">Approve Reimbursement</a></li>
        <li><a href="user_approval.php">Approve Users</a></li>
        <li><a href="give_rating.php">Give Rating</a></li>
        
          <?php }?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT f_name
    FROM registration
    where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
  echo $row["f_name"]; }?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="edituser.php" >Edit Profile </a></li>
          <li><a href="index.php" >Log Out</a></li>
         
        </ul>
      </li>
     
  
     </ul>
  </div>
</nav>