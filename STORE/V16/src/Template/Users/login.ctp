<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
	<!--<li style="color:purple;"><b>Updated on 19.1.2017</b></li>-->
    	<!--<li>New form for changing password and autocomplete dropdown in 'add member'</li>-->
    </ul>
</nav>
<div class="users form large-8 medium-16 columns content float: left">
	<!--<h6>On Thursday 19.1.2017 13:00-13:30, MMT will be down for maintenance. Sorry for the inconvenience.</h6>-->
	<h1>Login</h1>
    <?= $this->Form->create() ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('password') ?>
    <?= $this->Form->button('Login') ?>
    <?= $this->Form->end() ?>
</div>