<?php 
ob_start();
session_start();
$point = 0;
$answer_list = array(1,2,7,8,19);
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
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <script type="text/javascript" src='js/jquery.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
</head>
<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="page-header">
                    <h1>
                        Show your result below <small>(as your answer)</small>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-5 column">
                <h3 class="text-primary">
                    <strong>How Otto</strong> can help you get <strong>more client</strong>
                </h3>
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
                <p>Total point : <strong><?php echo $point;?></strong></p>
            </div>
            <!-- 
            <div class="col-md-7 column" style="border: solid">
                <dl>
                    <dt>Research shows</dt>
                    <dd>
                        According to Forrester Research your customer acquisition cost would be reduced by 33% which would save you approximately 0 by using Marketing Automation..<br><br>
                        Det gör samtidigt att ni ökar er marknadsföringsbudget för att nå fler så att ni har 0 mer att röra er med. <br><br>
                        Gartner Group och CSO Insights säger att det går att spara 0 redan inom 6-9 månader. <br><br>
                        Något som vi själva tror starkt på, men också tror är lite mer bransch/tjänsteberoende är att vi har sett att order-värden generellt har ökat när man använt Marketing Automation genom att köparen har kunnat få varje värde utbenat för sig. Ju mer komplex en affär är, ju högre ordervärden har vi sett. Annuitas group menar att det skulle leda till 47% högre ordervärde generellt, i ert fall innebär det att ni skulle tjäna 0 mer på högre ordervärden över ett år, utan att ta med ökad försäljning som MA också skulle leda till.
                    </dd>
                    <dt>Sonicians egna resultat</dt>
                    <dd>
                        Om det viktigaste sättet att nå nya kunder på är via mötesbokning och/eller kalla samtal, så stämmer siffrorna som Forrester Research säger rätt väl in på de effekter vi har sett på kunder som använder våra tjänster och Marketing Automation-systemet Otto®, även om vi nästan alltid sett en förbättring med ännu lite mer, i ert fall skulle det innebära ca 0 besparing om ni använder er av Marketing Automation.
                    </dd>
                    <dt>Riktigt bra effekt på webbsidors konvertering till lead</dt>
                    <dd>
                        Det finns inte lika mycket extern data på hur mycket mer leads man faktiskt kan få från webbsidor med hjälp av Marketing Automtion, men Aberdeen Group talar om 450% fler leads, Bull Solutions om 3ggr fler och själva har vi sett mellan 1,5 och 17ggr fler leads. För att ta fram data som gäller just för er behöver vi i så fall känna till mer om era antal besökare på webbsidan med mera.
                    </dd>
                    <dt>
                        Resultatet du får är ett uppskattat värde baserat på data från:
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
            -->
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <h3 class="text-primary">
                    For your organization, you should consider:
                </h3>
                <ul>
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
                            <li><?php echo $answer;?></li>
                        <?php endif;?>
                    <?php endif?>
                <?php endforeach;?>
                <?php endif;?>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="jumbotron">
                <h1>
                    What now?
                </h1>
                <p>
                    You’ll never forgive yourself unless you
                    Try us
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="#">Contact us</a>
                </p>
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
</body>
</html>