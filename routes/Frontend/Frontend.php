<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');

Route::get('macros', 'FrontendController@macros')->name('macros');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');


        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        Route::post('newprofile/profile','ProfileController@newstudent')->name('profile.new');

        //Study plan register sart with meeing pl


        Route::post('meet','StudyPlanController@meet')->name('meet');

        Route::post('development','StudyPlanController@development')->name('development');
        Route::post('course','StudyPlanController@courses')->name('course');
        Route::post('plan','StudyPlanController@plan')->name('plan');
        Route::get('planedit','StudyPlanController@planedit')->name('planedit');
        Route::get('showstudy','StudyPlanController@showstudy')->name('showstudy');
        Route::get('showcourse','StudyPlanController@showcourse')->name('showcourse');
        Route::get('showmeet','StudyPlanController@showmeet')->name('showmeet');
        Route::get('showengage','StudyPlanController@showengagement')->name('showengage');
        Route::get('showpublish','StudyPlanController@showpublish');
        Route::get('supervise/{id}','AccountController@addsupervisor')->name('supervise');
        Route::get('editengage/{id}','StudyPlanController@editengage')->name('editengage');
        Route::get('delstudy/{id}','StudyPlanController@delstudy')->name('delstudy');
        route::post('/remove_course','StudyPlanController@remove_course');

        Route::get('delmeet/{id}','StudyPlanController@delmeet')->name('delmeet');
        Route::get('delengage/{id}','StudyPlanController@delengage')->name('delengage');

        Route::get('delete_supervisor/{id}','AccountController@delete_supervisor')->name('delete_supervisor');
        Route::get('editstudy/{id}','StudyPlanController@editstudy')->name('editstudy');
        Route::patch('updatestudy/{id}','StudyPlanController@updatestudy')->name('updatestudy');

        Route::get('editcourse/{id}','StudyPlanController@editcourse')->name('editcourse');
        Route::patch('updatecourse/{id}','StudyPlanController@updatecourse')->name('updatecourse');

        Route::get('editengage/{id}','StudyPlanController@editengage')->name('editengage');
        Route::patch('updateengage/{id}','StudyPlanController@updateengage')->name('updateengage');


        Route::get('editstatus_meet/{id}','StudyPlanController@editstatus_meet');
        Route::patch('updatestatus_meet/{id}','StudyPlanController@updatestatus_meet');

        Route::get('editstatus_study/{id}','StudyPlanController@editstatus_study');
        Route::patch('updatestatus_study/{id}','StudyPlanController@updatestatus_study');

        Route::get('editmeet/{id}','StudyPlanController@editmeet')->name('editemeet');
        Route::patch('updatemeet/{id}','StudyPlanController@updatemeet')->name('updatemeet');

        Route::post('activity_create','StudyPlanController@activity_create')->name('activity_create');
        Route::post('engage','StudyPlanController@engage')->name('engage');
        Route::post('dissermination','StudyPlanController@dissermination')->name('dissermination');

        Route::post('save_publication','StudyPlanController@save_publication')->name('save_publication');

        Route::post('schools_visit','StudyPlanController@schools_visit');
        Route::post('supervised_students','StudyPlanController@supervised_students');
        Route::post('research_prog','StudyPlanController@research_prog');
        Route::post('confrence','StudyPlanController@confrence');
        Route::post('moments','StudyPlanController@moment');

        Route::post('visit_plan','StudyPlanController@visit_plan');

        Route::get('showsupervised','StudyPlanController@showsupervised');
        Route::post('/search','AccountController@search')->name('search');
        Route::get('supervise_delete/{id}','AccountController@supervise_delete');
        Route::get('print/{id}','AccountController@print_report');





        //save_publication



    });
});
