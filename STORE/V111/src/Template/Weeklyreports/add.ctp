<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="weeklyreports form large-6 medium-8 columns content float: left">
    <?= $this->Form->create($weeklyreport) ?>
    <fieldset>
        <legend><?= __('Add Weeklyreport, Page 1/3') ?></legend>
        <?php
            $current_weeklyreport = $this->request->session()->read('current_weeklyreport');
            use Cake\I18n\Time;
            
            if(!is_null($current_weeklyreport)){
                echo $this->Form->input('title', array('value' => $current_weeklyreport['title']));
                echo $this->Form->input('week', array('value' => $current_weeklyreport['week']));
                echo $this->Form->input('year', array('value' => $current_weeklyreport['year']));
                echo $this->Form->input('reglink', array('value' => $current_weeklyreport['reglink']));
                echo $this->Form->input('problems', array('value' => $current_weeklyreport['problems']));
                echo $this->Form->input('meetings', array('value' => $current_weeklyreport['meetings']));
                echo $this->Form->input('additional', array('value' => $current_weeklyreport['additional']));
            }
            else{
                $now = Time::now();
                $reportWeek = $now->weekOfYear -1;
                $currProj = $this->request->session()->read('selected_project')['project_name'];

				// autofills some info to report title
                echo $this->Form->input('title', array('value' => $currProj.', report for week '.$reportWeek.', '.$now->year) );
                echo $this->Form->input('week', array('value' => $reportWeek));
                echo $this->Form->input('year', array('value' => $now->year));
                echo $this->Form->input('reglink');
                echo $this->Form->input('problems');
                echo $this->Form->input('meetings');
                echo $this->Form->input('additional');
            }     
        ?>
    </fieldset>
    <?= $this->Form->button(__('Next Page')) ?>
    <?= $this->Form->end() ?>
</div>
