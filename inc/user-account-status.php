<?php
  // Show warning if User not filled the Contribution Details yet (status is 'new')
  $status = get_user_meta($current_user->id, 'status', true);
  if ('new' == $status){
    $status_message = "Please submit your Contribution Details. <br />We need to double check your information before we approve you as a participant.";
    $status_classname = "bg-warning text-muted";
  }
  elseif ('pending' == $status){
    $status_message = "Your Contribution Details are submitted and our administrators need to validate them. <br />We will send you an email soon!";
    $status_classname = "bg-warning text-muted";
  }
  elseif ('approved' == $status){
    $status_message = "Congratulations! Your account is approved.<br />Payment information is avaliable.";
    $status_classname = "bg-success text-white";
  }
?>