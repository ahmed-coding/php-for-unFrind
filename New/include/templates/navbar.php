<nav class="navbar navbar-inverse">
 <div class="container">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed"data-toggle="collapse" data-target="#app-nav"aria-expanded="false">
    <span class="sr-only">toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
   </button>

    
  </div>

	

	 
	 </ul>
	 <ul class="nav navbar-nav navbar-right">
	  <li class="dropdown">

	   <li><a href="members.php"><?php echo lang('MEMBERS')?></a></li>

	    <ul class="dropdown-menu">
		<li><a href="ManageAdmin.php">Manage Admin</a></li>
		 <li><a href="ManageAdmin.php?do=edit&userid=<?php echo $_SESSION['ID']?>">Edit </a></li>
		 <li><a href="logout.php">Logout</a></li>
		 </ul>
		</li>
	   </ul>
      </div>
     </div>
    </nav>  	 