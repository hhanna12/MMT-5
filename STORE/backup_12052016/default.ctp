<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'MMT';

//debug prints
//print_r($this->request->session()->read('selected_project_role'));
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->script(array(
        '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
    )) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>

	#TEST {
		z-index: 6666;
		
		background-color: #3E596B;
		position: fixed;
			bottom: 0px;
			right: 0;
		margin-bottom: 0.5em;
			margin-right: 0.5em;
		padding: 0.5em 2em 0em 2em;
		border-radius: 10px;
	}
	#TEST >p {
		color: #FFF;
			font-weight: bold;
			font-size: 0.9em;
		margin-bottom: 0.5em;
	}
	#TEST #pieni {
		font-size: 0.6em;
			color: #FFF;
		margin: 0;
			margin-top: -1em;
			margin-bottom: 0.5em;
	}
    ulnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    .linav {
        float: left;
        border-right:1px solid #bbb;
    }

    .linav:last-child {
        border-right: none;
    }

    .linav a {
        display: block;
        color: white;
        text-align: left;
        padding: 14px 16px;
        text-decoration: none;
    }

    .linav a:hover:not(.active) {
        background-color: #111;
    }

    .active {
        background-color: #4CAF50;
    }
    </style>
</head>
<body>
	<!-- This  section displays update info
	<div id="TEST">
		<p>This is the new version of MMT. <br />
		   For a full list of changes, please visit <a href="https://drive.google.com/file/d/0ByxYREM3bdC7V2N4c0pDT3RPd00/view">this link</a>.<br/>
		   Report bugs to a.i.valjakka (at) acm.org</p>
		<p id="pieni">This notification will be removed in the future.</p>
	</div>
	
	Let's hide this for now -->

    <!-- This div shows the top-left corner (currently chosen project) -->
	<div style="background-color: #15848F; color: white; font-weight: bold; padding-left: 0.5em; float: left; ">
    	<?php
    		// display info only if user is logged in
    		if ( !empty($this->request->session()->read('Auth.User')) ){
        		
	    		// fetch the name of current project
				$selected_project = $this->request->session()->read('selected_project');
	            $name = $selected_project['project_name'];
	            
	            // the text part
	            if ($selected_project)
		    		print_r('Current project: '.$name);
		    }
    	?>
    </div>
    
	<!-- this div shows the top-right corner (user's name + role) -->
    <div style="background-color: #15848F; color: white; font-weight: bold; padding-right: 0.5em; float: right; ">
        <?php
        	/* Displays user information to every page
        	   Requirement ID: 23
        	   - Andy
        	*/
        	// checks if logged in
        	if ( empty($this->request->session()->read('Auth.User')) ){
        		print_r('Currently not logged in');
        	} else {
        		// prints user's full name
        		print_r( ($this->request->session()->read('Auth.User.first_name')).' '.($this->request->session()->read('Auth.User.last_name')) );
				// checks if user has accessed any projects
				if ($this->request->session()->check('selected_project') ) {
					/* FIX 10.3.2016: now being a non-member is also shown
					   Requirement ID: 23
					   - Andy
					*/
					// display current role. Non-member status is also displayed
					if (($this->request->session()->read('selected_project_role')) != 'notmember' ) {
						print_r(', ' . ($this->request->session()->read('selected_project_role')) );
					} else {
						print_r(', not a member');
					}
				}
			}
        ?>
    </div>
    
    <!-- this div is only for clearing the two divs above (otherwise the floats wouldn't work) -->
    <div style="background-color: #15848F; color: #15848F; "> <?php echo "</br>"; ?> </div>
    
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <!--
        <ul class="top-bar-section">
            <li class="right">
                <?php 
                	/* This bit of code was commented out because it seemed useless to me
                	   If it actually does something then remove comment
                	   - Andy
                    if($this->request->session()->check('selected_project')){
                        $selected_project = $this->request->session()->read('selected_project');
                        $name = $selected_project['project_name'];
                        echo "<a> $name </a>";
                    }
                    */
                ?>
            </li>
        </ul>
        -->
        <ul id="ulnav">
            <li class="linav"><?= $this->Html->link(__('Home'), ['controller' => 'Projects', 'action' => 'index']) ?></a></li>
        </ul>
        <?php if(empty($this->request->session()->read('Auth.User'))){ ?>
            <ul id="ulnav">
                <ul style="float:right;list-style-type:none;">
                  <li class="linav"><?= $this->Html->link(__('Log in'), ['controller' => 'Users', 'action' => 'login']) ?></li>
                  <li class="linav"><?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'signup']) ?></li>
                </ul>
            </ul>   
        <?php } elseif($this->request->session()->check('selected_project')){ ?>
            <ul id="ulnav">
                <li class="linav"><?= $this->Html->link(__('Project'), ['controller' => 'Projects', 'action' => 'view', $this->request->session()->read('selected_project')['id']]) ?></li>
				<?php 
					if ( $this->request->session()->read('selected_project_role') != 'notmember' ) { ?>
		                <li class="linav"><?= $this->Html->link(__('Weekly reports'), ['controller' => 'Weeklyreports', 'action' => 'index']) ?></li>
		                <li class="linav"><?= $this->Html->link(__('Log time'), ['controller' => 'Workinghours', 'action' => 'index']) ?></li>
				<?php } ?>
                <li class="linav"><?= $this->Html->link(__('Charts'), ['controller' => 'Charts', 'action' => 'index']) ?></li>
                <ul style="float:right;list-style-type:none;">
                    <li class="linav"><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'editprofile']) ?></li>
                    <li class="linav"><?= $this->Html->link(__('Log out'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                </ul>
            </ul>
        <?php } else{?>
            <ul style="float:right;list-style-type:none;">
                <li class="linav"><?= $this->Html->link(__('Profile'), ['controller' => 'Users', 'action' => 'editprofile']) ?></li>
                <li class="linav"><?= $this->Html->link(__('Log out'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
        <?php }?>
        
        <!--
        <section class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </section>
        -->
    </nav>
    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
