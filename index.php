<?php
$xml=simplexml_load_file("xml/data.xml");

function displayProjects($project){
    $html = '<div class="project-detail"><div class="carousel">';
    foreach ($project->media->image as $image) {
        $html .= '<div><a href="'.$image->source.'" target="_blank">';
        $html .= '<img src="'.$image->thumb.'"></a></div>';      
    }   
    $html .= '</div><div class="project-cycle"><a href="'.$project->projectUrl.'" target="_blank">';
    $html .= '<span class="font6">'.$project->projectNo.'</span></a></div>';
    $html .= '<div class="project-info"><h6 class="font6">'.$project->projectTitle.'</h6><div class="font8 project-content">'.nl2br($project->projectInfo).'</div></div></div>';
    return $html;

}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" class="no-js">   <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $xml->metatitle; ?></title>
        <meta name="description" content="<?php echo $xml->metadescription ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <meta property="og:title" content="Hongzhi Li" />
        <meta property="og:description" content="<?php echo $xml->metadescription ?>" />
        <meta property="og:image" content="http://cs-server.usc.edu:35365/Hongzhi-Li/img/homepage.png" />
        <meta property="og:image:secure_url" content="http://cs-server.usc.edu:35365/Hongzhi-Li/img/homepage.png" />
        <meta property="og:url" content="" />
        <link rel="image_src" href=""/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/baguetteBox.min.css">
        <script>
            overlayCloseText = '<?php echo $xml->closebutton ?>';
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="intro">
                    <div id="name" class="font0">Hongzhi Li</div>
                    <div id="position" class="font6">Web Developer / Software Developer</div>
                </div>
                <div id="nav">  
                    <div class="nav_item"><a id= "nav_home" class="active" href="#">Home</a></div>
                    <div class="nav_item"><a id= "nav_project" href="#">Projects</a></div>
                    <div class="nav_item"><a id= "nav_resume" href="#">Resume</a></div>
                    <div class="nav_item"><a id= "nav_contact" href="#">Contact</a></div>
                </div>
            </div>
            <div id="container">
                <div id="home">
                    <div id="selfie"><img src="<?php echo $xml->selfie; ?>"></div>
                    <div id="hello">
                        <span class="font3" id="hello_big">Hello,</span>
                        <br/>
                        <span class="font4" id="greeting">a bit about me:</span>
                    </div>
                    <div id="link-list">
                        <div class="link-list" id="link-resume"><a href="#">
                            <span class="font8">MY RESUME</span>
                        </a></div>
                        <div class="link-list" id="link-work"><a href="#">
                            <span class="font8">MY WORK</span>
                        </a></div>
                        <div class="link-list" id="link-skill"><a href="#">
                            <span class="font8">MY SKILLS</span>
                        </a></div>
                    </div>
                    <div id="introduction">
                        <span id="selfIntro"class="font8"><?php echo nl2br($xml->selfIntroduction)?></span>
                    </div>
                </div>
                <div id= "project" style="display: none;">
                    <div class="font2 topic">LATEST PROJECTS</div>
                    <?php 
                        foreach ($xml->projects->project as $project) {
                            echo displayProjects($project);
                        }
                    ?>   
                    <div class="project-detail">
                        <div id="project-bottom">
                            <span class="font5">Just a sample of my work.&nbsp;To see more or discuss possible work &gt;&gt;</span>
                        </div>
                        <div id="talk-cycle">
                            <a href="#"><span class="font8">Let's Talk</span></a>
                        </div>
                    </div>
                </div>

                <div id= "resume" style="display: none;">
                    <div class="font2 topic">RESUME</div>
                    <div id="professioanal" class="resume-topic">
                        <div class="resume-cycle">
                            <span class="font6">Professional Info</span>
                        </div>
                        <div class="resume-topic-wrap">
                            <span class="font8"><?php echo nl2br($xml->resume->professionalInfo); ?></span>
                        </div>
                    </div>
                    <div id="experience" class="resume-topic">
                        <div class="resume-cycle">
                            <span class="font6">Work Experience</span>
                        </div>
                        <div class="resume-topic-wrap">
                            <?php 
                                $html = '';
                                foreach ($xml->resume->experience->job as $job) {
                                    $html .= '<div class="position font6">'.$job->position.'</div>';
                                    $html .= '<div class="company">'.$job->company.'</div>';
                                    $html .= '<div class="time font7">'.$job->time.'</div>';
                                    $html .= '<div class="description font8">'.nl2br($job->description).'</div>';
                                    $html .= '<span style="line-height: 0.9em;margin: 0;" class="font_8">&nbsp;</span>';
                                }
                                echo $html;
                            ?>
                        </div>
                    </div>
                    <div id="education" class="resume-topic">
                        <div class="resume-cycle">
                            <span class="font6">Education</span>
                        </div>
                        <div class="resume-topic-wrap">
                            <?php 
                                $html = '';
                                foreach ($xml->resume->education->level as $level) {
                                    $html .= '<div class="position font6">'.$level->name.'</div>';
                                    $html .= '<div class="company">'.$level->degree.'</div>';
                                    $html .= '<div class="time font7">'.$level->time.'</div>';
                                    $html .= '<span style="line-height: 0.9em;margin: 0;" class="font_8">&nbsp;</span>';
                                }
                                echo $html;
                            ?>
                        </div>
                    </div>
                    <div id="skill">
                        <div class="resume-small-circle"><img src="<?php echo $xml->resume->skill->imgUrl;?>"></div>
                        <span class="font6">Skills</span>
                        <div class="skill-set">
                            <?php 
                                $html = '';
                                foreach ($xml->resume->skill->skillSet->name as $skill) {
                                    $html .= '<span class="font8">'.$skill.'</span><br/>';
                                    
                                }
                                $html .= '<span style="line-height: 0.9em;margin: 0;" class="font_8">&nbsp;</span>';
                                echo $html;
                            ?>
                        </div>
                    </div>
                    <div id="language">
                        <div class="resume-small-circle"><img src="<?php echo $xml->resume->language->imgUrl;?>"></div>
                        <span class="font6">Languages</span>
                        <div class="language-set">
                            <?php 
                                $html = '';
                                foreach ($xml->resume->language->langSet->lang as $lang) {
                                    $html .= '<span class="font8">'.$lang.'</span><br/>';
                                    
                                }
                                $html .= '<span style="line-height: 0.9em;margin: 0;" class="font8">&nbsp;</span>';
                                echo $html;
                            ?>
                        </div>
                    </div>
                    <div id="download">
                        <div class="resume-small-circle"><img src="<?php echo $xml->resume->download->imgUrl;?>"></div>
                        <span class="font6">Download Resume</span>
                        <div class="download-set">
                            <?php 
                                $html = '';
                                foreach ($xml->resume->download->formatSet->format as $format) {
                                    $html .= '<a href="'.$format->source.'" target="_blank"><span class="font8">'.$format->name.'</span></a><br/>';
                                    
                                }
                                $html .= '<span style="line-height: 0.9em;margin: 0;" class="font8">&nbsp;</span>';
                                echo $html;
                            ?>
                        </div>
                    </div>
                </div>
                <div id= "contact" style="display: none;">
                    <div class="font2 topic">CONTACT</div>
                    <div id="contact-info">
                        <strong>Cell</strong><br/>
                        <span class="font8"><?php echo $xml->contact->phone?></span><br/>
                        <span style="line-height: 0.9em;margin: 0;" class="font8">&nbsp;</span><br/>
                        <strong>Email</strong><br/>
                        <span class="font8"><a href="mailto:<?php echo $xml->contact->email1 ?>"><?php echo $xml->contact->email1 ?></a> </span><br/>
                        <span class="font8"><a href="mailto:<?php echo $xml->contact->email1 ?>"><?php echo $xml->contact->email2 ?></a></span>
                    </div>
                    <div id="email-wrap">
                        <form>
                            <input type="text" name="name" id="name" placeholder="Name" required>
                            <input type="text" name="mail" id="mail" placeholder="Your Email" required>
                            <input type="text" name="subject" id="subject" class="" placeholder="Subject" required>
                            <textarea name="message" id="message" placeholder="Message" ></textarea>
                            <span id="success-message" class="font8">Thank you! I'll get back to you ASAP!</span>
                            <button type="button" id="submit" class="font7">Send</button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="footer-wrap">
                 <div id="footer">
                    <div class="link-to-contact" id="phone"><a class="foot-circle" href="#"><img src="<?php echo $xml->footer->phoneUrl;?>"/></a></div>
                    <div id="phone-infos">
                        <span class="font8"><strong>Call</strong></span><br/>
                        <span class="font8"><?php echo $xml->contact->phone?></span>
                    </div>
                    <div class="link-to-contact" id="mail"><a class="foot-circle" href="#"><img src="<?php echo $xml->footer->emailUrl;?>"/></a></div>
                    <div id="mail-infos">
                        <span class="font8"><strong>Contact</strong></span><br/>
                        <span class="font8"><a href="mailto:<?php echo $xml->contact->email1 ?>"><?php echo $xml->contact->email1 ?></a> </span><br/>
                        <span class="font8"><a href="mailto:<?php echo $xml->contact->email2 ?>"><?php echo $xml->contact->email2 ?></a></span>
                    </div>
                    <div class="link-to-contact" id="social"><a class="foot-circle" href="#"><img src="<?php echo $xml->footer->socialUrl;?>"/></a></div>
                    <div id="social-infos">
                        <span class="font8"><strong>Connect me</strong></span><br/>
                        <a href="<?php echo $xml->footer->linkedinUrl;?>" target="_blank"><img src="<?php echo $xml->footer->linkedin;?>"></a>
                    </div>
                    <div class="link-to-contact" id="copyright"><a class="foot-circle" href="#"><img src="<?php echo $xml->footer->copyright;?>"/></a></div>
                    <div id="copyright-infos">
                        <span class="font8">© 2014 by Hongzhi Li.</span>
                    </div>
                </div>
            </div>
            
        </div>
        <script src="js/jquery-2.0.0.min.js"></script>
        <script type="text/javascript" src="js/slick.min.js"></script>
        <script type="text/javascript" src="js/baguetteBox.js"></script>
        <script type="text/javascript" src="js/my.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-54148114-1', 'auto');
          ga('send', 'pageview');
        </script>
    </body>

</html>