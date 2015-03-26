<?php 
ob_start();
session_start();
$point = 0;
$answer_list = array(1,2,6,10,7,8,19);
//include "$root/survey/test/header.php";
// include_once "header.php";
include_once 'answer.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sonician-Survey Result</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/color.css">
</head>
<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="page-header">
                    <h1>
                        How Otto can help you get more clients<br>&ndash;Based on your individual answers
                    </h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-5 column">
                <?php if(isset($_SESSION['result'])): ?>
                    <!-- Answer Question 1 -->
                    <?php if(!empty($_SESSION['result'][1])):
                    $answer = answer_1($_SESSION['result'][1]['answer']);
                    ?>
                        <?php if(!empty($answer)):?>    
                        <p><?php echo $answer?></p>
                        <?php endif;?>
                    <?php endif;?>

                    <!-- Answer Question 19 -->
                    <?php if(!empty($_SESSION['result'][19])):
                    $answer = answer_19($_SESSION['result'][19]['answer']);
                    ?>
                        <?php if(!empty($answer)):?>
                        <p><?php echo $answer?></p>
                        <?php endif?>
                    <?php endif;?>

                    <!-- Answer Question 2 -->
                    <?php if(!empty($_SESSION['result'][2])):
                    $answer = answer_2($_SESSION['result'][2]['answer']);
                    ?>
                        <?php if(!empty($answer)):?>
                        <p><?php echo $answer?></p>
                        <?php endif?>
                    <?php endif;?>

                    <!-- Answer Question 7 -->
                    <?php if(!empty($_SESSION['result'][7])):
                    $answer = answer_7($_SESSION['result'][7]['answer']);
                    ?>
                        <?php if(!empty($answer)):?>
                        <p><?php echo $answer?></p>
                        <?php endif?>
                    <?php endif;?>

                    <!-- Answer Question 8 -->
                    <?php if(!empty($_SESSION['result'][8])):
                    $answer = answer_8($_SESSION['result'][8]['answer']);
                    ?>
                        <?php if(!empty($answer)):?>
                        <p><?php echo $answer?></p>
                        <?php endif?>
                    <?php endif;?>
                <?php endif;?>                
            </div>
            <?php if(!empty($_SESSION['result'][17])):
                if (isset($_SESSION['result'][16])) $valueofclient = $_SESSION['result'][16]['answer'];
                if (isset($_SESSION['result'][17])) $valuecac = $_SESSION['result'][17]['answer'];
                if (isset($_SESSION['result'][15])) $numof_new_clients = $_SESSION['result'][15]['answer'];

                if ($valuecac > 9000){
                    $spent_on_new = $numof_new_clients * $valuecac;
                    $save_on_new = number_format(1000 * round(0.33 * $spent_on_new/1000),0,","," ");
                    $save_on_new2 = number_format(1000 * round(0.3725 * $spent_on_new/1000),0,","," ");
                    $morebudget = number_format(1000 * round($spent_on_new * 0.5/1000),0,","," ");
                    $savequick = number_format(1000 * round($spent_on_new * 0.2/1000),0,","," ");
                    $ordervalueincrease = number_format(1000 * round($valueofclient * $numof_new_clients * 0.47/1000),0,","," ");
                }
                else
                {
                    $spent_on_new = $numof_new_clients * $valuecac;
                    $save_on_new = number_format(10 * round(0.33 * $spent_on_new/10),0,","," ");
                    $save_on_new2 = number_format(10 * round(0.3725 * $spent_on_new/10),0,","," ");
                    $morebudget = number_format(10 * round($spent_on_new * 0.5/10),0,","," ");
                    $savequick = number_format(10 * round($spent_on_new * 0.2/10),0,","," ");
                    $ordervalueincrease = number_format(10 * round($valueofclient * $numof_new_clients * 0.47/10),0,","," ");
                };
            ?> 
            <div class="col-md-7 column" style="border: solid">
                <dl>
                    <dt>Research shows</dt>
                    <dd>
                        According to Forrester Research your customer acquisition cost would be reduced by 33% which would save you approximately <b><?php echo $save_on_new?></b> by using Marketing Automation.<br>
                        That also means that you will increase your marketing budget with <b><?php echo $morebudget ?></b> which enables you to reach more people<br>
                        Gartner Group and CSO Insights say that it is possible to save <b><?php echo $savequick ?></b> within the first 6-9 months. <br>
                        Something that we strongly believe in but also think depends on the line of business/industry is that we have seen how order values generally increased as a result of using Marketing Automation. We have seen that the more complex a deal is, the higher are the order values. Annuitas Group believes that it would lead to a generally 47% higher order value in general, which means that in your case you would earn <b><?php echo $ordervalueincrease?></b> more during a year. Note that this calculation does not include the increased sales that Marketing Automation would lead to.<br>
                    </dd>
                    <dt>Sonicians own results</dt>
                    <dd>
                        If the most important way to reach new customers is through booking meetings and/or through cold calls, then the results from Forrester Research fits well with our observations of the effects at our clients using Otto®. In your case, the use of our services would mean approximately <b><?php echo $save_on_new2?></b> in savings.<br>
                    </dd>
                    <dt>Great effects on website conversion to leads</dt>
                    <dd>
                        There is not much external information or dataon how much more leads you can actually get from websites using Marketing Automation but Aberdeen Group means speaks of a 450% increase, Bull Solutions speaks of 3 times more and we have ourselves seen between 150% to 1700% lead-increase. In order to obtain data on how your increase can be we need to know more about the number of visitors at your website and more.<br>
                    </dd>
                    <dt>
                        The result you will get is estimated based on data you entered: your value of a client (<b><?php echo $valueofclient?></b>), your number of new clients last year(<b><?php echo $numof_new_clients?></b>) and your current client acquisition cost (<b><?php echo $valueofclient?></b>), and data from:
                    </dt>
                    <dd>
                        <div class="row clearfix">
                            <div class="col-md-4 column">
                                <img src="images/image001.gif" alt="Forrester Research">
                            </div>
                            <div class="col-md-4 column">
                                <img src="images/image002.gif" alt="Aberdeen Group">
                            </div>
                            <div class="col-md-4 column">
                                <img src="images/image003.gif" alt="Gartner Group">
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4 column">
                                <img src="images/image004.gif" alt="CSO Insights">
                            </div>
                            <div class="col-md-4 column">
                                <img src="images/image005.gif" alt="Annuitas">
                            </div>
                            <div class="col-md-4 column">
                                <img src="images/image006.gif" alt="Sonician">
                            </div>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <?php endif;?>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <h3 class="text-primary">
                    Otto&reg; will particularly help you with:
                </h3>
                <ul class="optional">
                <?php if(!empty($_SESSION['result'])):?>
                    <?php foreach($_SESSION['result'] as $k => $result):?>
                        <?php if(!in_array($k, $answer_list)):?>
                            <?php 
                            $answer = '';
                            if(function_exists('answer_'.$k))
                            {
                                $answer = call_user_func('answer_'.$k,$result['answer']);
                            }
                            ?>
                            <?php if(!empty($answer)):?>
                                <?php if(is_array($answer)):?>
                                    <?php foreach($answer as $a):?>
                                        <li><?php echo $a;?></li>
                                    <?php endforeach?>
                                <?php else:?>
                                    <li><?php echo $answer;?></li>
                                <?php endif?>
                            <?php endif;?>
                        <?php endif?>
                    <?php endforeach;?>
                    <?php 
                        $a_6 = answer_6($_SESSION['result']['6']['answer']);
                        if( $a_6 )
                        {
                            echo "<p>" . $a_6 . "</p>";
                        }
                    ?>
                <?php endif;?>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="jumbotron clearfix">
                <h1>
                    What now?
                </h1>
                <p>
                    You’ll never forgive yourself unless you
                    Try us
                </p>
                <?php showWebinar($point,$_SESSION['result'][10]['answer']);?>
            </div>
            <div class="col-md-4 column">
                <img alt="footer" src="images/footer.png" />
            </div>
            <div class="col-md-4 column" style="line-height: 60px">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href='www.sonician.com'>www.sonician.com</a>
            </div>
            <div class="col-md-4 column">
                <address> 
                    <strong>Sonician</strong><br /> 
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>: +46 31 31 34 370 <br>
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>: support@sonician.com <br>
                </address>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</body>
</html>