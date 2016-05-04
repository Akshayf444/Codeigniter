<?php

$Sidebar = array(
    'My Talent' => array(
        'Personal Details' => 'User/view',
        'Work Experience' => 'User/view',
        'Education Details' => 'User/view',
        'Certification Details' => 'User/view',
        'Skills' => 'User/view',
    ),
    'Search Job' => array(
        'Jobs in top Cities' => 'User/Comingsoon',
        'Jobs By Courses' => 'User/Comingsoon',
        'Jobs By Education' => 'User/Comingsoon',
        'Jobs By Designation' => 'User/Comingsoon',
    ),
    'Career Plus' => array(
        'Resume Writing Servies' => 'User/Comingsoon',
        'Linked In Profile Writing' => 'User/Comingsoon',
        'Value Packs' => 'User/Comingsoon',
        'Cover Letter Samples' => 'User/Comingsoon',
    ),
    'Career Info' => array(
        'Career Advice' => 'User/Comingsoon',
        'Interview Preperation' => 'User/Comingsoon',
        'Resume' => 'User/Comingsoon',
        'Industry Overview' => 'User/Comingsoon',
        'IT BPO' => 'User/Comingsoon',
    ),
    'Salary Check' => 'User/Comingsoon',
    'Account Setting' => array(
        'Change Password' => 'User/Comingsoon',
        'Logout' => 'User/logout')
        /* 'Profile' => array(
          'View Profile' => 'User/view',
          'Project' => 'User/user_projects',
          'Education' => 'User/user_qualification',
          'Upload Resume' => 'User/resume',
          'Enter Work Experince' => 'WorkExperince/work_exp',
          ),
          'Jobs & Application' => array(
          'Saved Jobs' => 'User/viewsavedjobs',
          'Application History' => 'User/Applicationhistory'
          ),
          'Recruiters' => array(
          'Job & Updates' => 'User/SearchJob'
          ),
          'Settings' => array(
          'Change Password' => 'User/changepassword',
          'Logout' => 'User/logout'
          ), */
);
if (!empty($Sidebar)) {
    foreach ($Sidebar as $menu => $submenu) {
        echo '<li><a href="' . site_url($submenu) . '">' . $menu . '</a>';

        if (isset($submenu) && is_array($submenu) && !empty($submenu)) {
            echo '<ul class="sub-menu">';
            foreach ($submenu as $name => $link) {
                echo '<li><a href="' . site_url($link) . '">' . $name . '</a></li>';
            }
            echo '</ul>';
        }


        echo '</li>';
    }
}