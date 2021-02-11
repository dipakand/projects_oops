<?php
$weeks_name = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

if(isset($_POST['next']))
{
    $val = explode('-',$_POST['next']);
    if($val[1] == 12){
        $cur_mn = 12;
        $previous = 11;
        $next = 1;

        $previous1 = ($val[0]).'-'.$previous;
        $next1 = ($val[0]+1).'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;
    }
    elseif($val[1] == 1){
        $cur_mn = 1;
        $previous = 12;
        $next = 2;

        $previous1 = ($val[0]-1).'-'.$previous;
        $next1 = ($val[0]).'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;
    }
    else{
        $cur_mn = $val[1];
        $previous = $cur_mn-1;
        $next = $cur_mn+1;

        $previous1 = $val[0].'-'.$previous;
        $next1 = $val[0].'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;
    }
}
elseif(isset($_POST['previous']))
{
    $val = explode('-',$_POST['previous']);
    if($val[1] == 1){
        $cur_mn = $val[1];
        $previous = 12;
        $next = $cur_mn+1;

        $previous1 = ($val[0]-1).'-'.$previous;
        $next1 = ($val[0]-1).'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;

    }
    elseif($val[1] == 12){
        $cur_mn = $val[1];
        $previous = $val[1]-1;
        $next = 1;

        $previous1 = ($val[0]).'-'.$previous;
        $next1 = ($val[0]).'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;
    }
    else{
        $cur_mn = $val[1];
        $previous = $cur_mn-1;
        $next = $cur_mn+1;

        $previous1 = $val[0].'-'.$previous;
        $next1 = $val[0].'-'.$next;
        $cur_mn1 = $val[0].'-'.$cur_mn;
    }
}
elseif(isset($_REQUEST['today']))
{
    $cur_mn = date("m", strtotime(date('Y-m')) );
    $cur_ye = date("Y", strtotime(date('Y-m')) );
    $previous = $cur_mn-1;
    $next = $cur_mn+1;

    $previous1 = $cur_ye.'-'.$previous;
    $next1 = $cur_ye.'-'.$next;
    $cur_mn1 = $cur_ye.'-'.$cur_mn;
}
else
{
    $cur_mn = date("m", strtotime(date('Y-m')) );
    $cur_ye = date("Y", strtotime(date('Y-m')) );
    $previous = $cur_mn-1;
    $next = $cur_mn+1;

    $previous1 = $cur_ye.'-'.$previous;
    $next1 = $cur_ye.'-'.$next;
    $cur_mn1 = $cur_ye.'-'.$cur_mn;
}
$cur_mn_curr = date("Y-m");
//echo $cur_mn.' '.$previous.' '.$next.' = '.$next1.' = '.$previous1.' '.$cur_mn1.' '.$cur_mn_curr; echo nl2br("\n");


$manual = date('Y-m',strtotime(date($cur_mn1)));
//$manual = date('Y-m',strtotime(date("Y-".$cur_mn)));
$date1 = date("Y-m-01",strtotime($manual));
$end1 = date('Y-m-t', strtotime($date1)); //get end date of month
$date12 = date('Y-m-d',strtotime('last sunday',strtotime($date1)));
$end12 = date('Y-m-d',strtotime('this saturday',strtotime($end1)));

$date = $date12;
$end = $end12;
$wk=1;
$arr_key = 1;
while(strtotime($date) <= strtotime($end)) {
    if($wk%8==0)
    {
        $arr_key++;
    }
    $day_num = date('d', strtotime($date));
    $day_name = date('l', strtotime($date));
    $day_no = date('m', strtotime($date));
    $day_yer = date('Y', strtotime($date));
    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    //    $days_row[$arr_key][$day_num] = $day_no;
    $days_row[$arr_key][$day_num] = $day_yer.'-'.$day_no;
    $wk++;
}
$curr = date("m", strtotime($date1) );
$currm = date("m", strtotime($date1));
$curry = date("Y", strtotime($date1));

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <script src="javasc.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"  >

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body>

    </body>
</html>
<div id="calendar-wrap">
    <header>
    </header>
    <div id="calendar">
        <form method="post">
            <h1 class="text-left">
                <span class="pull-left">
                    
                </span>
                <?php echo date("F Y", strtotime($date1)); ?>
                <div class="pull-right" style="margin-top: -6px;" >
                <button class="btn btn-primary glyphicon glyphicon-chevron-left " name="previous" value="<?php echo $previous1;?>"></button>
                    <?php if($cur_mn_curr != $cur_mn1){?>
                    <button class="btn btn-default" name="today"  >today</button>
                    <?php } else {?>
                    <span class="btn btn-default disabled" style="color: #333; background-color: #e6e6e6; border-color: #adadad;">today</span>
                    <?php } ?>
                    <button class="btn btn-primary glyphicon glyphicon-chevron-right " name="next" value="<?php echo $next1;?>"><?php  $next1;?></button>
                </div>
            </h1>
        </form>
        <ul class="weekdays">
            <?php 
            foreach($weeks_name as $w_name)
            {
                echo "<li>".$w_name."</li>";
            }
            ?>
        </ul>

        <?php 
        foreach($days_row as $key => $rows)
        {
        ?>
        <ul class="days">
            <?php

            foreach($rows as $key1 => $days)
            {


                $exp = explode('-',$days);
                $d = sprintf("%02d", $exp[1]);
                $y = sprintf("%02d", $exp[0]);
                if($d == $currm){ $other_month = ''; } else { $other_month ='other-month'; }
            ?>
            <li class="day <?php echo $other_month;?>" style="
                                                              <?php echo date("Y-m-d") == date("Y-m-d",strtotime(date($days.'-'.$key1))) ? 'background:#efefc1' : '';?>;<?php echo date("Y-m-d") <= date("Y-m-d",strtotime(date($days.'-'.$key1))) ? 'cursor: pointer' : '';?>; ">
                <div class="date" style="<?php echo date("Y-m-d") == date("Y-m-d",strtotime(date($days.'-'.$key1))) ? 'background: #14ff04; color: #000000;' : '';?><?php echo $d != $currm ? 'background: #908e8e;' : '';?>"><?php echo $key1;?></div>
                <?php //echo $days.'-'.$key1.' ';?>
                <!--<div class="alert-danger">
HTML 5 lecture with Brad Traversy from Eduonix
</div> 
<div class="alert-success">
HTML 5 lecture with Brad Traversy from Eduonix
</div>  --> 					
            </li>
            <?php

            }
            ?>
        </ul>
        <?php
        }
        ?>

        <?php 
        /*?>
        <!-- Days from previous month -->

        <ul class="days">
            <li class="day other-month">
                <div class="date">27</div>    					
            </li>
            <li class="day other-month">
                <div class="date">28</div>
                <div class="event">
                    <div class="event-desc">
                        HTML 5 lecture with Brad Traversy from Eduonix
                    </div>
                    <div class="event-time">
                        1:00pm to 3:00pm
                    </div>
                </div>    					
            </li>
            <li class="day other-month">
                <div class="date">29</div>    					
            </li>
            <li class="day other-month">
                <div class="date">30</div>    					
            </li>
            <li class="day other-month">
                <div class="date">31</div>    					
            </li>

            <!-- Days in current month -->

            <li class="day">
                <div class="date">1</div>    					
            </li>
            <li class="day">
                <div class="date">2</div>
                <div class="event">
                    <div class="event-desc">
                        Career development @ Community College room #402
                    </div>
                    <div class="event-time">
                        2:00pm to 5:00pm
                    </div>
                </div>     					
            </li>
        </ul>

        <!-- Row #2 -->

        <ul class="days">
            <li class="day">
                <div class="date">3</div>    					
            </li>
            <li class="day">
                <div class="date">4</div>    					
            </li>
            <li class="day">
                <div class="date">5</div>    					
            </li>
            <li class="day">
                <div class="date">6</div>    					
            </li>
            <li class="day">
                <div class="date">7</div>
                <div class="event">
                    <div class="event-desc">
                        Group Project meetup
                    </div>
                    <div class="event-time">
                        6:00pm to 8:30pm
                    </div>
                </div>
                <div class="event">
                    <div class="event-desc">
                        Group Project meetup
                    </div>
                    <div class="event-time">
                        6:00pm to 8:30pm
                    </div>
                </div>     					
            </li>
            <li class="day">
                <div class="date">8</div>    					
            </li>
            <li class="day">
                <div class="date">9</div>    					
            </li>
        </ul>

        <!-- Row #3 -->

        <ul class="days">
            <li class="day">
                <div class="date">10</div>    					
            </li>
            <li class="day">
                <div class="date">11</div>    					
            </li>
            <li class="day">
                <div class="date">12</div>    					
            </li>
            <li class="day">
                <div class="date">13</div>    					
            </li>
            <li class="day">
                <div class="date">14</div><div class="event">
                <div class="event-desc">
                    Board Meeting
                </div>
                <div class="event-time">
                    1:00pm to 3:00pm
                </div>
                </div>     					
            </li>
            <li class="day">
                <div class="date">15</div>    					
            </li>
            <li class="day">
                <div class="date">16</div>    					
            </li>
        </ul>

        <!-- Row #4 -->

        <ul class="days">
            <li class="day">
                <div class="date">17</div>    					
            </li>
            <li class="day">
                <div class="date">18</div>    					
            </li>
            <li class="day">
                <div class="date">19</div>    					
            </li>
            <li class="day">
                <div class="date">20</div>    					
            </li>
            <li class="day">
                <div class="date">21</div>    					
            </li>
            <li class="day">
                <div class="date">22</div>
                <div class="event">
                    <div class="event-desc">
                        Conference call
                    </div>
                    <div class="event-time">
                        9:00am to 12:00pm
                    </div>
                </div>     					
            </li>
            <li class="day">
                <div class="date">23</div>    					
            </li>
        </ul>

        <!-- Row #5 -->

        <ul class="days">
            <li class="day">
                <div class="date">24</div>    					
            </li>
            <li class="day">
                <div class="date">25</div>
                <div class="event">
                    <div class="event-desc">
                        Conference Call
                    </div>
                    <div class="event-time">
                        1:00pm to 3:00pm
                    </div>
                </div>     					
            </li>
            <li class="day">
                <div class="date">26</div>    					
            </li>
            <li class="day">
                <div class="date">27</div>    					
            </li>
            <li class="day">
                <div class="date">28</div>    					
            </li>
            <li class="day">
                <div class="date">29</div>    					
            </li>
            <li class="day">
                <div class="date">30</div>    					
            </li>
        </ul>

        <!-- Row #6 -->

        <ul class="days">
            <li class="day">
                <div class="date">31</div>    					
            </li>
            <li class="day other-month">
                <div class="date">1</div> <!-- Next Month -->    					
            </li>
            <li class="day other-month">
                <div class="date">2</div>    					
            </li>
            <li class="day other-month">
                <div class="date">3</div>    					
            </li>
            <li class="day other-month">
                <div class="date">4</div>    					
            </li>
            <li class="day other-month">
                <div class="date">5</div>    					
            </li>
            <li class="day other-month">
                <div class="date">6</div>    					
            </li>
        </ul>

   <?php */ ?>
    </div>
    <!-- /. calendar -->
</div><!-- /. wrap -->