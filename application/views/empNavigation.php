<?php

$Sidebar = array(
    'My Talent' => array(
        'Personal Details' => 'Employee/Home',
        'Work Experience' => 'Employee/Home',
        'Education Details' => 'Employee/Home',
        'Certification Details' => 'Employee/Home',
        'Skills' => 'Employee/Home',
    ),
    'Jobs & Responses' => array(
        'Post A Hot Vacancy' => 'Job/add',
        'Jobs And Responses' => 'Job/job_list',
        'Jobs By Education' => 'User/Comingsoon',
        'Jobs By Designation' => 'User/Comingsoon',
    ),
    'Search' => array(
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
    'Account Settings' => array(
        'Change Password' => 'Employee/changepassword',
        'Logout' => 'Employee/logout')
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