<?php

/* SVN FILE: $Id: routes.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
$languages = array('en', 'fr', 'ar');

$lang_perma_links = implode('|', $languages);
Router::connect('/admin/', array('controller' => 'pages', 'action' => 'index', 'prefix' => 'admin', 'admin' => true));
Router::connect('/admin/student/time/*', array('controller' => 'students', 'action' => 'time', 'prefix' => 'student'));
Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
Router::connect('/:languages/', array('controller' => 'pages', 'action' => 'home'), array('languages' => $lang_perma_links));
Router::connect('/pages/view/Arabic-courses-programs', array('controller' => 'pages', 'action' => 'index', 'arabic-courses-programs'));
Router::connect('/:languages/pages/view/Arabic-courses-programs', array('controller' => 'pages', 'action' => 'index', 'arabic-courses-programs'), array('languages' => $lang_perma_links));


// certificate route
Router::connect('/cert/*', array('controller' => 'certificates', 'action' => 'view'));



Router::connect('/our-teachers', array('controller' => 'teachers', 'action' => 'ourteachers'));
Router::connect('/:languages/our-teachers', array('controller' => 'teachers', 'action' => 'ourteachers'), array('languages' => $lang_perma_links));


Router::connect('/jobs', array('controller' => 'pages', 'action' => 'view', 'jobs'));
Router::connect('/:languages/jobs', array('controller' => 'pages', 'action' => 'view', 'jobs'), array('languages' => $lang_perma_links));

Router::connect('/about-earabiclearning', array('controller' => 'pages', 'action' => 'view', 'about-us'));
Router::connect('/:languages/about-earabiclearning', array('controller' => 'pages', 'action' => 'view', 'about-us'), array('languages' => $lang_perma_links));



Router::connect('/ContactUs', array('controller' => 'contacts', 'action' => 'contactus'));
Router::connect('/:languages/ContactUs', array('controller' => 'contacts', 'action' => 'contactus'), array('languages' => $lang_perma_links));

Router::connect('/classes', array('controller' => 'StudentClasses', 'action' => 'get_all'));
Router::connect('/:languages/classes', array('controller' => 'StudentClasses', 'action' => 'get_all'), array('languages' => $lang_perma_links));


Router::connect('/FAQs', array('controller' => 'faqs', 'action' => 'index'));
Router::connect('/:languages/FAQs', array('controller' => 'faqs', 'action' => 'index'), array('languages' => $lang_perma_links));


//Router::connect('/content/*', array('controller' => 'pages', 'action' => 'index'));
//Router::connect('/pages/view/*', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
//Router::connect('/', array('controller' => 'students', 'action' => 'index'));


Router::connect('/pages/staticHeader/*', array('controller' => 'pages', 'action' => 'staticHeader'));
Router::connect('/:languages/pages/staticHeader/*', array('controller' => 'pages', 'action' => 'staticHeader'), array('languages' => $lang_perma_links));


Router::connect('/pages/blogg', array('controller' => 'pages', 'action' => 'blogg'));
Router::connect('/pages/test/*', array('controller' => 'pages', 'action' => 'test'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'index'));

Router::connect('/:languages/pages/*', array('controller' => 'pages', 'action' => 'index'), array('languages' => $lang_perma_links));


//Router::connect('/pages/:action/*', array('controller' => 'pages', 'action' => 'view'));


Router::connect('/student/orders/:action/*', array('controller' => 'orders', 'prefix' => 'student'));
Router::connect('/:languages/student/orders/:action/*', array('controller' => 'orders', 'prefix' => 'student'), array('languages' => $lang_perma_links));

Router::connect('/student/documents/:action/*', array('controller' => 'documents', 'prefix' => 'student'));
Router::connect('/:languages/student/documents/:action/*', array('controller' => 'documents', 'prefix' => 'student'), array('languages' => $lang_perma_links));

Router::connect('/student/study_resources/:action/*', array('controller' => 'study_resources', 'prefix' => 'student'));
Router::connect('/:languages/student/study_resources/:action/*', array('controller' => 'study_resources', 'prefix' => 'student'), array('languages' => $lang_perma_links));

Router::connect('/student/:action/*', array('controller' => 'students', 'prefix' => 'student'));
Router::connect('/:languages/student/:action/*', array('controller' => 'students', 'prefix' => 'student'), array('languages' => $lang_perma_links));


//Router::connect('/:languages/:controller/:action/*', array(), array('languages' => $lang_perma_links));


Router::connect('/teacher/orders/:action/*', array('controller' => 'orders', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/orders/:action/*', array('controller' => 'orders', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));


Router::connect('/teacher/lessons/:action/*', array('controller' => 'lessons', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/lessons/:action/*', array('controller' => 'lessons', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));


Router::connect('/teacher/messages/:action/*', array('controller' => 'messages', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/messages/:action/*', array('controller' => 'messages', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));


Router::connect('/teacher/documents/:action/*', array('controller' => 'documents', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/documents/:action/*', array('controller' => 'documents', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));

Router::connect('/teacher/study_categories/:action/*', array('controller' => 'study_categories', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/study_categories/:action/*', array('controller' => 'study_categories', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));


Router::connect('/teacher/students/follow_up', array('controller' => 'students', 'action' => 'follow_up', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/students/follow_up/*', array('controller' => 'students', 'action' => 'follow_up', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));

Router::connect('/teacher/study_resources/:action/*', array('controller' => 'study_resources', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/study_resources/:action/*', array('controller' => 'study_resources', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));




Router::connect('/teacher/:action/*', array('controller' => 'teachers', 'prefix' => 'teacher'));
Router::connect('/:languages/teacher/:action/*', array('controller' => 'teachers', 'prefix' => 'teacher'), array('languages' => $lang_perma_links));


Router::connect('/sitemap.xml', array('controller' => 'sitemap', 'action' => 'index'));



Router::connect('/free-arabic-keyboard', array('controller' => 'pages', 'action' => 'arabic_keyboard'));
Router::connect('/:languages/free-arabic-keyboard', array('controller' => 'pages', 'action' => 'arabic_keyboard'), array('languages' => $lang_perma_links));


Router::connect('/learn-arabic-online/classic-arabic-course', array('controller' => 'pages', 'action' => 'view', 'classic-arabic'));
Router::connect('/:languages/learn-arabic-online/classic-arabic-course', array('controller' => 'pages', 'action' => 'view', 'classic-arabic'), array('languages' => $lang_perma_links));


Router::connect('/learn-arabic-online/egyptian-arabic-course', array('controller' => 'pages', 'action' => 'view', 'egyptian-arabic'));
Router::connect('/:languages/learn-arabic-online/egyptian-arabic-course', array('controller' => 'pages', 'action' => 'view', 'egyptian-arabic'), array('languages' => $lang_perma_links));


Router::connect('/learn-arabic-online/arabic-for-kids-course', array('controller' => 'pages', 'action' => 'view', 'arabic-for-kids1'));
Router::connect('/:languages/learn-arabic-online/arabic-for-kids-course', array('controller' => 'pages', 'action' => 'view', 'arabic-for-kids1'), array('languages' => $lang_perma_links));




Router::connect('/learn-arabic-online/learn-quraan-course', array('controller' => 'pages', 'action' => 'quraan', 'learn-quraan'));
Router::connect('/:languages/learn-arabic-online/learn-quraan-course', array('controller' => 'pages', 'action' => 'quraan', 'learn-quraan'), array('languages' => $lang_perma_links));


Router::connect('/learn-arabic-online/arabic-online-conversation-course', array('controller' => 'pages', 'action' => 'view', 'arabic-online-conversation-course'));
Router::connect('/:languages/learn-arabic-online/arabic-online-conversation-course', array('controller' => 'pages', 'action' => 'view', 'arabic-online-conversation-course'), array('languages' => $lang_perma_links));



Router::connect('/how-to-learn-arabic-online', array('controller' => 'pages', 'action' => 'view', 'how-it-works'));
Router::connect('/:languages/how-to-learn-arabic-online', array('controller' => 'pages', 'action' => 'view', 'how-it-works'), array('languages' => $lang_perma_links));

Router::connect('/learn-arabic-online', array('controller' => 'pages', 'action' => 'index', 'arabic-courses-programs'));
Router::connect('/:languages/learn-arabic-online', array('controller' => 'pages', 'action' => 'index', 'arabic-courses-programs'), array('languages' => $lang_perma_links));


Router::connect('/learn-arabic-online/*', array('controller' => 'pages', 'action' => 'view'));
Router::connect('/:languages/learn-arabic-online/*', array('controller' => 'pages', 'action' => 'view'), array('languages' => $lang_perma_links));

Router::connect('/free-trial-arabic-lesson', array('prefix' => 'student', 'controller' => 'orders', 'action' => 'freeTrial', 'student' => true));
Router::connect('/:languages/free-trial-arabic-lesson', array('prefix' => 'student', 'controller' => 'orders', 'action' => 'freeTrial', 'student' => true), array('languages' => $lang_perma_links));


//Router::connect('/online-arabic-courses-pricing', array('controller' => 'courses', 'action' => 'pricing'));
Router::connect('/online-arabic-courses-pricing/*', array('controller' => 'courses', 'action' => 'new_pricing'));
Router::connect('/q/a/*', array('controller' => 'questionnaires', 'action' => 'answer'));
Router::connect('/:languages/online-arabic-courses-pricing/*', array('controller' => 'courses', 'action' => 'new_pricing'), array('languages' => $lang_perma_links));

Router::connect('/online-quran-courses-pricing', array('controller' => 'courses', 'action' => 'new_pricing', 13));
Router::connect('/:languages/online-quran-courses-pricing', array('controller' => 'courses', 'action' => 'new_pricing', 13), array('languages' => $lang_perma_links));


Router::connect('/courses/pricing/*', array('controller' => 'courses', 'action' => 'new_pricing'));
Router::connect('/:languages/courses/pricing/*', array('controller' => 'courses', 'action' => 'new_pricing'), array('languages' => $lang_perma_links));


Router::connect('/online-arabic-course-registration', array('prefix' => 'student', 'controller' => 'students', 'action' => 'register'));
Router::connect('/:languages/online-arabic-course-registration', array('prefix' => 'student', 'controller' => 'students', 'action' => 'register'), array('languages' => $lang_perma_links));

Router::connect('/:languages/:controller/:action/*', array(), array('languages' => $lang_perma_links));
Router::connect('/:languages/:controller/*', array(), array('languages' => $lang_perma_links));

Router::connect
        (
        '/fusion_charts/swf/:chart', array
    (
    'plugin' => 'FusionCharts',
    'controller' => 'swf',
    'action' => 'proxy'
        )
);
?>